<?php

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows courses overview', function () {
    //arrange
    Course::factory()->create(['title' => 'Course A', 'description' => 'Description Course A', 'released_at' => Carbon::now()]);
    Course::factory()->create(['title' => 'Course B', 'description' => 'Description Course B', 'released_at' => Carbon::now()]);
    Course::factory()->create(['title' => 'Course C', 'description' => 'Description Course C', 'released_at' => Carbon::now()]);

    //act & Assert
    get(route('home'))
        ->assertSeeText([
            'Course A',
            'Description Course A',
            'Course B',
            'Description Course B',
            'Course C',
            'Description Course C'
        ]);
});

it('shows only released courses', function () {
    // arrange
    Course::factory()->create(['title' => 'Course A', 'released_at' => Carbon::yesterday()]);
    Course::factory()->create(['title' => 'Course B',]);

    //act & Assert
    get(route('home'))
        ->assertSeeText([
            'Course A'
        ])
        ->assertDontSee([
            'Course B'
        ]);
});

it('shows courses by release date', function () {
    // arrange
    Course::factory()->create(['title' => 'Course A', 'released_at' => Carbon::yesterday()]);
    Course::factory()->create(['title' => 'Course B', 'released_at' => Carbon::now()]);

    //act & Assert
    get(route('home'))
        ->assertSeeInOrder([
            'Course B',
            'Course A'
        ]);
});



