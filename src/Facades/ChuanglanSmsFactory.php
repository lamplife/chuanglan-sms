<?php

namespace Firstphp\ChuanglanSms\Facades;

use Illuminate\Support\Facades\Facade;

class ChuanglanSmsFactory extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'ChuanglanSmsService';
    }

}

