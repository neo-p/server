<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_CLOSE)
 */
class OnCloseEvent
{
    public function handler(Server $server, int $fd, int $reactorId)
    {
        // var_dump("__ON_CLOSE__, fd: " . $fd . " / reactorId: " . $reactorId);
    }
}
