<?php

it('can view page', function () {
    $this->get(route('logs.show', ['id' => app_log()]))->assertOk();
});
