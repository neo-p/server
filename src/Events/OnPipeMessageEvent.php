<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_PIPE_MESSAGE)
 */
class OnPipeMessageEvent
{
    public function handler(Server $server, int $srcWorkerId, $message)
    {
        // var_dump("__ON_PIPE_MESSAGE__, srcWorkerId: " . $srcWorkerId);
    }
}
