<?php

namespace NeoP\Server;

use NeoP\Console\Annotation\Mapping\Command;
use NeoP\Console\Annotation\Mapping\CommandMapping;
use NeoP\Server\Server;
use NeoP\DI\Annotation\Mapping\Inject;
use Neop\Stdlib\Dir;
use Swoole\Process;

/**
 * @Command("service", alias="srv", describe="Service related commands. The specific service type is determined by the [server.service] configuration in the [service.php] file.")
 */
class Commander
{

    /**
     * @Inject()
     * @var Server
     */
    private $server;

    /**
     * @CommandMapping("start", describe="Start service.")
     */
    public function start(Process $process)
    {
        $this->server->start($process);
    }

    /**
     * @CommandMapping("restart", describe="Restart service.")
     */
    public function restart(Process $process)
    {
        $filename = $this->server->getServicePidFileName();
        $pid = Dir::getFileContent($filename);
        $process->exec('/usr/bin/kill', ['-SIGUSR1', $pid]);
    }

    /**
     * @CommandMapping("stop", describe="Stop service.")
     */
    public function stop(Process $process)
    {
        $filename = $this->server->getServicePidFileName();
        $pid = Dir::getFileContent($filename);
        Dir::deleteFile($filename);
        $process->exec('/usr/bin/kill', ['-SIGKILL', $pid]);
    }
}
