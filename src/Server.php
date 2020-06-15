<?php

declare(strict_types=1);

namespace NeoP\Server;

use NeoP\DI\Annotation\Mapping\Depend;
use NeoP\Application;
use NeoP\DI\Container;
use Swoole\Process;
use NeoP\Server\Contract\ServiceInerface;
use NeoP\Server\Events\EventType;
use NeoP\Server\Exception\ServerException;
use NeoP\Server\Listener\SwooleListener;
use Neop\Stdlib\Dir;
use ReflectionMethod;

/**
 * @Depend()
 * @var Server
 */
class Server
{
    const PROCESS_MODE = SWOOLE_PROCESS;
    const BASE_MODE = SWOOLE_BASE;

    protected $server;
    protected $service;
    protected $host = '0.0.0.0';
    protected $port = 8888;
    protected $mode = self::PROCESS_MODE;
    protected $setting = [];

    public function __construct()
    {
        $this->host = service('server.host', $this->host);
        $this->port = service('server.port', $this->port);
        $this->mode = service('server.mode', $this->mode);
        $this->service = service('server.service', $this->service);
    }
    
    private function init()
    {
        $this->server = $this->getServer();
    }

    public function getServer() {
        if (Container::hasDefinition($this->service)) {
            $server = Container::getDefinition($this->service);
            if ($server instanceof ServiceInerface) {
                $server->init($this->host, $this->port, $this->mode, $this->setting);
                return $server;
            } else {
                throw new ServerException("Service must implement interface NeoP\Server\Contract\ServiceInerface");
            }
        } else {
            throw new ServerException("Service must be add @Depend annotation");
        }
    }

    public function registerEvent(): void
    {
        if ($this->server instanceof ServiceInerface) {
            if (SwooleListener::hasListens(EventType::LISTEN_SWOOLE)) {
                foreach (SwooleListener::getListens(EventType::LISTEN_SWOOLE) as $event => $callback) {
                    $this->server->on($event, $callback);
                }
            }
        } else {
            throw new ServerException("Server must be initialized first!");
        }
    }

    public function start(Process $process): void
    {

        $this->init();
        $this->registerEvent();
        $this->setServicePid($process->pid);
        $this->server->registerEvent();
        $this->server->start();
    }

    public function addProcess(Process $process): int
    {
        return $this->server->addProcess($process);
    }


    public function setServicePid(int $pid) 
    {
        $filename = $this->getServicePidFileName();
        Dir::setFile($filename, (string) $pid);
    }

    public function getServicePidFileName(): string
    {
        $pidName = service('server.pid', Application::$service . '.pid');
        $tmpPath = service('server.tmp', 'runtime');

        if (strpos('/', $pidName) === 0) {
            $pidName = substr($pidName, 1);
        }

        if (strpos('/', $tmpPath) !== 0) {
            $tmpPath = getcwd() . '/' . $tmpPath;
        }

        if (substr($tmpPath, -1) != '/') {
            $tmpPath =  $tmpPath . '/';
        }
        $filename = $tmpPath . $pidName;
        return $filename;
    }
}
