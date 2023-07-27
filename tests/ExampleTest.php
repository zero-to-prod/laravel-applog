<?php

use Illuminate\Support\Facades\Log;
use Zerotoprod\AppLog\Models\AppLog;

it('can test', function () {
    Log::debug('test');
    expect(AppLog::first()->exists())->toBeTrue();
});
