<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_WORKER_ERROR)
 */
class OnWorkerErrorEvent
{
    public function handler(Server $server, int $workerId, int $workerPid, int $exitCode, int $signal)
    {
        // var_dump("__ON_WORKER_ERROR__, workerId: " . $workerId);
    }
}
