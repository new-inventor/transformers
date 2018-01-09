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
    /** @var \DateTimeZone|null */
    private $timezone;
    
    /**
     * DateTimeToString constructor.
     *
     * @param string             $format
     * @param \DateTimeZone|null $timezone
     */
    public function __construct(string $format = 'd.m.Y H:i:s', \DateTimeZone $timezone = null)
    {
        $this->format = $format;
        $this->timezone = $timezone;
    }
    
    /**
     * @param \DateTime $value
     *
     * @return string
     */
    public function transformInputValue($value): ?string
    {
        return $value->setTimezone($this->timezone)->format($this->format);
    }
    
    protected function validateInputTypes($value)
    {
        TypeChecker::check($value)->types(\DateTime::class)->fail();
    }
}