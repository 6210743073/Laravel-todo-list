<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class FunctionTest extends TestCase
{

    use RefreshDatabase;
    #7
    public function test_welcome_page_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    #8
    public function test_dashboard_page_can_be_rendered()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }
    #9
    public function test_add_task_page_can_be_rendered()
    {
        $response = $this->get('/task');

        $response->assertStatus(302);
    }
    #10
    public function test_authenticated_users_can_create_tasks()
    {

        $response = $this->actingAs($user = User::factory()->create())
             ->post('/task', [
                 'description' => 'Test Task'
             ]);

        $response->assertStatus(404);
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}