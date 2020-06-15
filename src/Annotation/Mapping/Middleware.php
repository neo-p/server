<?php

namespace NeoP\Server\Annotation\Mapping;

use NeoP\Annotation\Annotation\Mapping\AnnotationMappingInterface;
use Doctrine\Common\Annotations\Annotation\Required;

use function annotationBind;

/** 
 * @Annotation 
 * @Target({"CLASS"})
 * @Attributes({
 *     @Attribute("name", type="string"),
 * })
 *
 */
final class Middleware implements AnnotationMappingInterface
{
    /**
     * @Required()
     */
    private $name;

    function __construct($params)
    {
        annotationBind($this, $params, 'setName');
    }

    public function setName(?string $name = NULL): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}