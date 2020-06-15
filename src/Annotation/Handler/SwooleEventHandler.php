<?php

namespace NeoP\Server\Annotation\Handler;

use NeoP\Annotation\Annotation\Handler\Handler;
use NeoP\Annotation\Annotation\Mapping\AnnotationHandler;
use NeoP\Server\Annotation\Mapping\SwooleEvent;
use NeoP\Server\Listener\SwooleListener;
use NeoP\Server\Events\EventType;
use NeoP\Server\Exception\ServerException;
use ReflectionClass;
use ReflectionMethod;

/**
 * @AnnotationHandler(SwooleEvent::class)
 */
class SwooleEventHandler extends Handler
{
    public function handle(SwooleEvent $annotation, ReflectionClass $reflectionClass)
    {
        if ($reflectionClass->hasMethod(EventType::EVENT_HANDLE)) {
            $method = $reflectionClass->getMethod(EventType::EVENT_HANDLE);
        } else {
            throw new ServerException('Class ' . $reflectionClass->getName() . 
                                        ' not has ' . EventType::EVENT_HANDLE . 
                                        ' method');
            
        }
        $class = $reflectionClass->getName();
        SwooleListener::setListen($annotation->getType(), $annotation->getEvent(), $method->getClosure((new $class())));
    }
}