<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('returns a successful response', function () {
    // Act & Assert
    get(route('home'))
        ->assertOk();
});

it('gives bacl successful response for course details page', function () {
    //arrange
    $course = Course::factory()->create();

    //act & assert
    get(route('course-details', $course))
        ->assertOk();
});
