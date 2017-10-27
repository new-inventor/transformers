<?php
/**
 * Project: transformers
 * User: george
 * Date: 13.10.17
 */

namespace NewInventor\Transformers\Exception;


use NewInventor\Transformers\Transformer\StringToScreamingSnakeCase;

abstract class AbstractException extends \InvalidArgumentException implements ExceptionInterface
{
    /** @var string */
    protected $className;
    /** @var string */
    protected $stringCode;
    
    /**
     * AbstractTransformationException constructor.
     *
     * @param string $className
     * @param string $message
     */
    public function __construct(string $className, $message = '')
    {
        $this->className = $className;
        $this->stringCode =
            StringToScreamingSnakeCase::make()->transform(substr($className, strrpos($className, '\\') + 1));
        parent::__construct($message);
    }
    
    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
    
    /**
     * @return string
     */
    public function getStringCode(): string
    {
        return $this->stringCode;
    }
}