<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_WORKER_EXIT)
 */
class OnWorkerExitEvent
{
    public function handler(Server $server, int $workerId)
    {
        // var_dump("__ON_WORKER_EXIT__, workerId: " . $workerId);
    }
}
