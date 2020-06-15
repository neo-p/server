<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_FINISH)
 */
class OnFinishEvent
{
    public function handler(Server $server, int $taskId, $data)
    {
        // var_dump("__ON_FINISH__, taskId: " . $taskId );
    }
}
