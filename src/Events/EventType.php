<?php

namespace NeoP\Server\Events;

class EventType
{
    const EVENT_HANDLE = "handler";

    const ON_START = "start";
    const ON_OPEN = "open";
    const ON_SHUTDOWN = "shutdown";
    const ON_WORKER_START = "workerStart";
    const ON_WORKER_STOP = "workerStop";
    const ON_WORKER_EXIT = "workerExit";
    const ON_CONNECT = "connect";
    const ON_PACKET = "packet";
    const ON_CLOSE = "close";
    const ON_TASK = "task";
    const ON_FINISH = "finish";
    const ON_PIPE_MESSAGE = "pipeMessage";
    const ON_WORKER_ERROR = "workerError";
    const ON_MANAGER_START = "managerStart";
    const ON_MANAGER_STOP = "managerStop";

    const LISTEN_SWOOLE = 1;
    const LISTEN_UDP = 5;
}