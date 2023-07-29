<?php

use Zerotoprod\AppLog\Models\AppLog;

it('can view page', function () {
    $this->get(route('logs.show', ['id' => AppLog::factory()->create()]))->assertOk();
});
