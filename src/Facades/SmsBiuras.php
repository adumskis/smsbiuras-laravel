<?php

namespace Adumskis\SmsBiurasLaravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class SmsBiuras
 * @package Adumskis\SmsBiurasLaravel\Facade
 * @see \Adumskis\SmsBiurasPhp\SmsBiuras
 */
class SmsBiuras extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Adumskis\SmsBiurasPhp\SmsBiuras::class;
    }
}