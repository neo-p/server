<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_TASK)
 */
class OnTaskEvent
{
    public function handler(Server $server, int $taskId, int $srcWorkerId, $data)
    {
        // var_dump("__ON_TASK__, taskId: " . $taskId . " / srcWorkerId: " . $srcWorkerId);
    }
}
