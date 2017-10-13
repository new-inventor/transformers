<?php
/**
 * Project: transformers
 * User: george
 * Date: 13.10.17
 */

namespace NewInventor\Transformers\Exception;


class TransformationContainerException extends AbstractException
{
    /** @var array */
    protected $inner;
    
    /**
     * TransformationContainerException constructor.
     *
     * @param string $className
     * @param array  $inner
     * @param string $message
     */
    public function __construct(string $className, array $inner, string $message)
    {
        $this->inner = $inner;
        parent::__construct($message);
    }
    
    /**
     * @return array
     */
    public function getInner(): array
    {
        return $this->inner;
    }
}