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

    public function test_authenticated_users_can_create_tasks()
    {

        $response = $this->actingAs($user = User::factory()->create())
             ->post('/task', [
                 'description' => 'Task 1'
             ]);
             
        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}