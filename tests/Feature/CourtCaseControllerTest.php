<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class CourtCaseControllerTest extends TestCase
{
    use LazilyRefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_it_creates_a_court_case(): void
    {
        $clerk = User::factory()->create();
        $lawyer = User::factory()->create();
        
        $response = $clerk->create([
            "lawyer_id" => $lawyer->id,
        ]);

        // $response->assertCreated();
        $this->assertDatabaseHas('court_cases', [
            'id' => $response->json('data.id')
        ]);
    }
}
