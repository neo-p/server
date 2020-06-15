<?php

namespace NeoP\Server\Events;

use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_MANAGER_STOP)
 */
class OnManagerStopEvent
{
    public function handler(Server $server)
    {
        // var_dump("__ON_MANAGER_Stop__");
    }
}
