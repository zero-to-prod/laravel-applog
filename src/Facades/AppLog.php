<?php

namespace Zerotoprod\AppLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zerotoprod\AppLog\AppLog
 */
class AppLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Zerotoprod\AppLog\AppLog::class;
    }
}
