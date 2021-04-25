<?php

namespace NeoP\Server\Annotation\Handler;

use NeoP\DI\Container;
use NeoP\Annotation\Annotation\Handler\Handler;
use NeoP\Annotation\Annotation\Mapping\AnnotationHandler;
use NeoP\Server\Annotation\Mapping\Middleware;
use NeoP\Server\Middleware\MiddlewareProvider;
use NeoP\Server\Exception\ServerException;
use ReflectionClass;
use ReflectionMethod;

/**
 * @AnnotationHandler(Middleware::class)
 */
class MiddlewareHandler extends Handler
{
    public function handle(Middleware $annotation, ReflectionClass &$reflectionClass)
    {
        
        if (!$reflectionClass->hasMethod(MiddlewareProvider::MIDDLEWARE_HANDLER)) {
            throw new ServerException('Class ' . $reflectionClass->getName() . 
                                        ' not has ' . MiddlewareProvider::MIDDLEWARE_HANDLER . 
                                        ' method');
            
        }
        $class = $reflectionClass->getName();

        if ($annotation->getName() === NULL) {
            $annotation->setName((string) mt_rand());
        }
        MiddlewareProvider::AddMiddleware($class, $class);
    }
}