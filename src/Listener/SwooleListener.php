<?php

namespace NeoP\Server\Listener;


class SwooleListener
{
    // listen event map
    private static $listens = [];

    public static function hasListens(int $type)
    {
        return isset(self::$listens[$type]);
    }

    public static function setListen(int $type, string $event, callable $callable)
    {
        self::$listens[$type][$event] = $callable;
    }

    public static function getListen(int $type, string $event): callable
    {
        return self::$listens[$type][$event];
    }

    public static function getListens(int $type): array
    {
        return self::$listens[$type];
    }
}