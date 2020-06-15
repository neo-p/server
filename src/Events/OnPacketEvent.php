<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_PACKET)
 */
class OnPacketEvent
{
    public function handler(Server $server, string $data, array $clientInfo)
    {
        // var_dump("__ON_PACKET__, fd: " . $fd . " / reactorId: " . $reactorId);
    }
}
