<?php

namespace NeoP\Server\Events;

use NeoP\Process\Process;
use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;

/**
 * @SwooleEvent(EventType::ON_MANAGER_START)
 */
class OnManagerStartEvent
{
    public function handler(Server $server)
    {
        swoole_set_process_name(Process::getProcessName(Process::MANAGER));
        // swoole_set_process_name();
        // var_dump("__ON_MANAGER_START__");
    }
}
