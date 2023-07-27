<?php

use Illuminate\Support\Facades\Log;
use Zerotoprod\AppLog\Models\AppLog;

it('test logging', function () {
    Log::debug('test');

    $app_log = AppLog::first();

    expect($app_log->id)->toBe(1)
        ->and($app_log->message)->toBe('test')
        ->and(json_decode($app_log->context, true)['id'])->toBeString()
        ->and($app_log->level)->toBe(100)
        ->and($app_log->level_name)->toBe('DEBUG')
        ->and($app_log->channel)->toBe('testing')
        ->and($app_log->record_datetime->toDateTimeString())->toBeString()
        ->and($app_log->extra)->toBe('[]')
        ->and($app_log->formatted)->toBeString()
        ->and($app_log->created_at->toDateTimeString())->toBeString();
});
