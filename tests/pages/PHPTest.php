<?php

it('can view page', function () {
    $this->get(route('php'))->assertOk();
});
