<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 29.08.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\TypeChecker\TypeChecker;

class DateTimeToString extends Transformer
{
    /**
     * @var string
     */
    private $format;
    
    /**
     * DateTimeToString constructor.
     *
     * @param string $format
     */
    public function __construct(string $format = 'd.m.Y H:i:s')
    {
        $this->format = $format;
    }
    
    /**
     * @param \DateTime $value
     *
     * @return string
     */
    public function transformInputValue($value): ?string
    {
        return $value->format($this->format);
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->types(\DateTime::class)->fail();
    }
}