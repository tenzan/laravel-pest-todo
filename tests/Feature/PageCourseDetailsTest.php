<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows course details', function () {
    //arrange
    $course = Course::factory()->create([
        'tagline' => 'Course tagline',
        'image' => 'image.png',
        'learnings' => [
            'Topic 1',
            'Topic 2',
            'Topic 3',
        ],
    ]);

    //act & assert
    //    $this->withoutExceptionHandling();
    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            'Course tagline',
            'Topic 1',
            'Topic 2',
            'Topic 3',
        ])
        ->assertSee('image.png');
});

it('shows course video count', function () {
    //arrange
    //    $this->withoutExceptionHandling();
    $course = Course::factory()->create();
    Video::factory()->count(3)->create(['course_id' => $course->id]);

    //act & assert
    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});
