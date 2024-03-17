<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('only returns released courses for released scope', function () {
    // arrange
    Course::factory()->released()->create();
    Course::factory()->create();

    // act & assert
     expect(Course::released()->get())
         ->toHaveCount(1)
         ->first()->id->toEqual(1);
});
