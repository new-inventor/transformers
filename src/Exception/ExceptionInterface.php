<?php
/**
 * Project: transformers
 * User: george
 * Date: 13.10.17
 */

namespace NewInventor\Transformers\Exception;


interface ExceptionInterface
{
    /**
     * @return string
     */
    public function getClassName(): string;
    
    /**
     * @return string
     */
    public function getStringCode(): string;
}