<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 31.08.17
 */

namespace NewInventor\Transformers\Exception;


use NewInventor\Transformers\Transformer\StringToScreamingSnakeCase;

class TransformationException extends \InvalidArgumentException implements ExceptionInterface
{
    /** @var string */
    protected $className;
    /** @var string */
    protected $stringCode;
    
    /**
     * NormalizeException constructor.
     *
     * @param string $className
     * @param string $message
     */
    public function __construct(string $className, $message = '')
    {
        $this->className = $className;
        $this->stringCode = StringToScreamingSnakeCase::make()->transform($className);
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