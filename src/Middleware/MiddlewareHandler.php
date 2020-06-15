<?php

namespace NeoP\Server\Middleware;

class MiddlewareHandler
{

    public static function handler()
    {
        // Executor Server Middleware
        self::executeMiddleware(MiddlewareProvider::getServiceMiddlewares());
        // Executor Common Middleware
        self::executeMiddleware(service("middlewares.common"));
    }

    public static function executeMiddleware(array $middlewares)
    {
        foreach ($middlewares as $middleware) {
            if (MiddlewareProvider::checkMiddleware($middleware)) {
                MiddlewareProvider::getMiddleware($middleware)();
            } else {
                throw new MiddlewareException("Error: Middleware [{$middleware}] is not found!");
            }
        }
    }

}
