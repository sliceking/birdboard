<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
  use WithFaker, RefreshDatabase;

  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_user_can_create_projects()
  {
    $this->withoutExceptionHandling();

    $attributes = [
      'title' => $this->faker->sentence,
      'description' => $this->faker->paragraph,
    ];

    $this->post('/projects', $attributes);

    $this->assertDatabaseHas('projects', $attributes);

    $this->get('/projects')->assertSee($attributes['title']);
  }
}
