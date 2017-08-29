<?php

namespace Adumskis\SmsBiurasLaravel\Facade;

use Illuminate\Support\Facades\Facade;

class SmsBiuras extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Adumskis\SmsBiurasPhp\SmsBiuras::class;
    }
}