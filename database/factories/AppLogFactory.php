<?php

namespace Zerotoprod\AppLog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Monolog\Level;
use Zerotoprod\AppLog\Models\AppLog;

class AppLogFactory extends Factory
{
    protected $model = AppLog::class;

    public function definition(): array
    {
        return [
            AppLog::message => '',
            AppLog::context => '',
            AppLog::level => Level::Debug,
            AppLog::channel => '',
            AppLog::record_datetime => now(),
            AppLog::extra => '',
            AppLog::formatted => '',
        ];
    }
}
