<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker; //This is useful because we need to make fake data in the attributes array
    use RefreshDatabase; //This is useful because after the test this ensures we reset everything back to the initial state

    /**
     * A new test.
     * @return void
     */
    /** @test */
    public function only_authenticated_users_can_create_projects(): void
    {
        //An arrray of attributes using faker to fill the record on the table
        $attributes = Project::factory()->raw();
        //if I do a request to that endpoint, but I don't give it a title, it should throw an error
        $this->post('/projects', $attributes)->assertRedirect('login');
    }

    /**
     * A basic feature test example.
     * @return void
     */
    /** @test */
    public function a_user_can_create_a_project(): void
    {
        $this->withoutExceptionHandling();
        //An arrray of attributes using faker to fill the record on the table
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        //By making a post request, a project will be created - Post request
        $this->post('/projects', $attributes)->assertRedirect('/projects');

        //This makes it to be seen on the database table

        //After I make the request, i'm going to assert that the database has a projects table that include the previous attributes
        $this->assertDatabaseHas('projects', $attributes); //Insertion in table

        //Post request that enables us to see our previous post request
        $this->get('/projects')->assertSee($attributes['title']);
    }

    /**
     * A new test.
     * @return void
     */
    /** @test */
    public function a_project_requires_a_title(): void
    {
        //An arrray of attributes using faker to fill the record on the table
        $attributes = Project::factory()->raw(['title' => '']);
        //if I do a request to that endpoint, but I don't give it a title, it should throw an error
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');

    }
    /**
     * A new test.
     * @return void
     */
    /** @test */
    public function a_project_requires_a_description(): void
    {
        //An arrray of attributes using faker to fill the record on the table
        $attributes = Project::factory()->raw(['description' => '']);
        //if I do a request to that endpoint, but I don't give it a title, it should throw an error
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /**
     * A new test.
     * @return void
     */
    /** @test */
    public function a_user_can_view_a_project(): void
    {
        $this->withoutExceptionHandling();
        //This is useful because we need to make fake data in the attributes array
        $project = Project::factory()->create();
        //This is useful because after the test this ensures we reset everything back to the initial state
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
}
