<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;
class TaskUnitTest extends TestCase
{

    use RefreshDatabase;

    public function test_schema_description()
    {
    }

    #Validation task
    public function test_schema_useingOnly_Thai_description()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post('/task', [
                'description' => 'สวัสดีวันจันทร์'
            ]);

        $response->assertStatus(302);
    }
    public function test_schema_useingOnly_Num_description()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post('/task', [
                'description' => 'สวัสดีวันจันทร์'
            ]);

        $response->assertStatus(302);
    }
    public function test_schema_useingOnly_SQL_injection_description()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post('/task', [
                'description' => 'txtUserId = getRequestString("UserId");'
            ]);

        $response->assertStatus(302);
    }
    public function test_schema_useingOnly_Null_description()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post('/task', [
                'description' => null
            ]);

        $response->assertStatus(302);
    }
    public function test_schema_1000char_description()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post('/task', [
                'description' => Str::random(1000),
            ]);

        $response->assertStatus(302);
    }
}
