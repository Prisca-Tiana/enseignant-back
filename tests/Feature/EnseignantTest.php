<?php

namespace Tests\Feature;

use App\Models\Enseignant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnseignantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_all_enseignant(){
        $enseignants = Enseignant::factory()->create();

        $response = $this->getJson(route('enseignant.index'))->json();

        $this->assertEquals(1,count($response));
    }
}
