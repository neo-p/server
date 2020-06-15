<?php

namespace NeoP\Server\Middleware;

class MiddlewareProvider
{

    /**
     * middleware handler method
     * @var string
     */
    const MIDDLEWARE_HANDLER = 'handler';

    /**
     * all middleware collect
     * @var array
     */
    protected static $middlewares = [];

    /**
     * service middleware collect
     * @var array
     */
    protected static $serviceMiddlewares = [];

    public static function addMiddleware(string $key, callable $callable): void
    {
        self::$middlewares[$key] = $callable;
    }

    public static function getMiddleware(string $key): callable
    {
        return self::$middlewares[$key];
    }

    public static function getMiddlewares(): array
    {
        return self::$middlewares;
    }

    public static function checkMiddleware(string $key): bool
    {
        return isset(self::$middlewares[$key]);
    }
    
    public static function addServiceMiddleware(string $key): void
    {
        array_push(self::$serviceMiddlewares, $key);
    }
    
    public static function getServiceMiddlewares(): array
    {
        return self::$serviceMiddlewares;
    }

}
