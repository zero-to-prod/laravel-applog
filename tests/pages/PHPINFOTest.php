<?php

it('can view page', function () {
    $this->get(route('phpinfo'))->assertOk();
});
