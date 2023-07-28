<?php

namespace Zerotoprod\AppLog\Facades;

use Illuminate\Support\Facades\Facade;

class AppLog extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Zerotoprod\AppLog\AppLog::class;
    }
}
