<?php
/**
 * Project: TP messaging service
 * User: george
 * Date: 09.08.17
 */

namespace NewInventor\Transformers\Transformer;


use NewInventor\Transformers\Transformer;
use NewInventor\TypeChecker\TypeChecker;

class StringToDateTime extends Transformer
{
    /** @var string */
    private $format;
    /** @var \DateTimeZone|null */
    private $timezone;
    
    /**
     * StringToDateTime constructor.
     *
     * @param string             $format
     * @param \DateTimeZone|null $timezone
     */
    public function __construct(string $format = 'd.m.Y H:i:s', \DateTimeZone $timezone = null)
    {
        $this->format = $format;
        $this->timezone = $timezone;
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->tstring()->fail();
    }
    
    protected function transformInputValue($value)
    {
        $value = \DateTime::createFromFormat($this->format, $value)->setTimezone($this->timezone);
        if ($value !== false) {
            return $value;
        }
        throw new \InvalidArgumentException("Date format invalid. (must be '{$this->format}')");
    }
}