<?php

namespace NeoP\Server;

use stdClass;
use Swoole\Coroutine;
use NeoP\Server\Exception\ContextException;

// 上下文
class Context
{

    public const REQUEST = "request";
    public const RESPONSE = "response";
    
    protected const CONTEXT = "context";

    protected static $context;

    public static function set(string $key, $value, ?int $cid = NULL): void
    {
        self::isCo(__FUNCTION__);
        if (! isset(Coroutine::getContext($cid)[self::CONTEXT])) {
            Coroutine::getContext($cid)[self::CONTEXT] = new stdClass();
        }
        Coroutine::getContext($cid)[self::CONTEXT]->{$key} = $value;
    }
    
    public static function get(?string $key = NULL, $default = NULL, ?int $cid = NULL)
    {
        self::isCo(__FUNCTION__);
        if ($key === NULL) {
            if (isset(Coroutine::getContext($cid)[self::CONTEXT])) {
                return Coroutine::getContext($cid)[self::CONTEXT];
            }
            return [];
        } else {
            if (! isset(Coroutine::getContext($cid)[self::CONTEXT]->{$key})) {
                return $default;
            }
            return Coroutine::getContext($cid)[self::CONTEXT]->{$key};
        }
    }
    
    public static function isCo(string $func)
    {
        if (Coroutine::getPcid() != -1) {
            throw new ContextException("{$func} context must be done in the root process!");
        }
    }
}