<?php
/**
 * Project: transformers
 * User: george
 * Date: 13.10.17
 */

namespace NewInventor\Transformers\Exception;


use NewInventor\Transformers\Transformer\StringToScreamingSnakeCase;

class TypeException extends \InvalidArgumentException
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
}