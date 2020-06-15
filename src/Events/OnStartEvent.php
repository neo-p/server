<?php

namespace NeoP\Server\Events;

use NeoP\Process\Process;
use Swoole\Server;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Events\EventType;
/**
 * @SwooleEvent(EventType::ON_START)
 */
class OnStartEvent 
{
    public function handler(Server $server)
    {
        swoole_set_process_name(Process::getProcessName(Process::MASTER));
        // var_dump("__ON_START__");
    }
}