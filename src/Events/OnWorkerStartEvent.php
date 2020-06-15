<?php

namespace NeoP\Server\Events;

use NeoP\Process\Process;
use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;
use NeoP\DI\Annotation\Mapping\Inject;

/**
 * @SwooleEvent(EventType::ON_WORKER_START)
 */
class OnWorkerStartEvent
{

    public function handler(Server $server, int $workerId)
    {
        swoole_set_process_name(Process::getProcessName(Process::WORKER));
        // var_dump("__ON_WORKER_START__, workerId: ". $workerId);
    }
}
