<?php

namespace Zerotoprod\AppLog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zerotoprod\AppLog\Models\AppLog;


class AppLogFactory extends Factory
{
    protected $model = AppLog::class;

    public function definition()
    {
        return [
            AppLog::message => '',
            AppLog::context => '',
            AppLog::level => 100,
            AppLog::level_name => 'DEBUG',
            AppLog::channel => '',
            AppLog::record_datetime => now(),
            AppLog::extra => '',
            AppLog::formatted => '',
        ];
    }
}

