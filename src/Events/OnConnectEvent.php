<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_CONNECT)
 */
class OnConnectEvent
{
    public function handler(Server $server, int $fd, int $reactorId)
    {
        // echo("\nworkerId: " . $server->worker_id);
    }
}
