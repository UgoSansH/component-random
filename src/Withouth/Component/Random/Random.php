<?php

namespace Withouth\Component\Random;

/**
 * Random
 */
class Random implements RandomInterface
{
    /**
     * {@inheritDoc}
     */
    public static function generate($length = null)
    {
        $bytes = false;

        if (function_exists('openssl_random_pseudo_bytes') && 0 !== stripos(PHP_OS, 'win')) {
            $bytes = openssl_random_pseudo_bytes(32, $strong);

            if (true !== $strong) {
                $bytes = false;
            }
        }

        if (false === $bytes) {
            $bytes = hash('sha256', uniqid(mt_rand(), true), true);
        }

        $bytes = base_convert(bin2hex($bytes), 16, 36);

        return (!is_null($length)) ? substr($bytes, 0, $length) : $bytes;
    }

}
