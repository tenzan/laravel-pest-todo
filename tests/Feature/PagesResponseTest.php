<?php

use function Pest\Laravel\get;

it('returns a successful response', function () {
    // Act & Assert

    get(route('home'))
        ->assertOk();
});

