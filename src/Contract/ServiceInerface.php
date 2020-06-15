<?php

namespace NeoP\Server\Contract;

interface ServiceInerface 
{
    public function on(string $event, callable $callback): void;
    public function start(): void;
    public function init(string $host, int $port, int $mode, array $setting): void;
    public function registerEvent(): void;
}