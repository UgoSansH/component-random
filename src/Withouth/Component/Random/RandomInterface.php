<?php

namespace Withouth\Component\Random;


interface RandomInterface
{
    /**
     * generate random token
     *
     * @param integer|null $length
     *
     * @return string
     */
    public static function generate($length = null);

}