<?php

namespace NeoP\Server\Annotation\Mapping;

use NeoP\Server\Events\EventType;
use NeoP\Annotation\Annotation\Mapping\AnnotationMappingInterface;
use Doctrine\Common\Annotations\Annotation\Required;

use function annotationBind;

/** 
 * @Annotation 
 * @Target({"CLASS"})
 * @Attributes({
 *     @Attribute("event", type="string"),
 *     @Attribute("type", type="int")
 * })
 *
 */
final class SwooleEvent implements AnnotationMappingInterface
{
    /**
     * @Required()
     */
    private $event;

    private $type = EventType::LISTEN_SWOOLE;

    function __construct($params)
    {
        annotationBind($this, $params, 'setEvent');
    }

    public function setEvent(string $event): void
    {
        $this->event = $event;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getType(): int
    {
        return $this->type;
    }

}