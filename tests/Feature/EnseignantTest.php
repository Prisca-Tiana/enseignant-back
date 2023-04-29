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
    public function get_all_enseignant(){
        $enseignants = Enseignant::factory()->create();
        $response = $this->getJson(route('enseignants.index'))->json();
        $this->assertEquals(1,count($response));
    }
    
    /** @test */
    public function get_one_enseignant(){
        $enseignants = Enseignant::factory()->create();
        $response = $this->getJson(route('enseignants.show',$enseignants->id))->json();
        $this->assertEquals($response['id'], $enseignants->id);
    }
    
    /** @test */
    public function store_enseignants(){
        $enseignants = Enseignant::factory()->make();
        $response = $this->postJson(route("enseignants.store",
            [
                "matricule" => "100120354",
                "nom_enseignant" => "SIAKA",
                "taux_horaire" => 3250000,
                "nb_heure" => 48,
            ]
            ))->assertCreated()->json();
        $this->assertDatabaseHas("enseignants",["id" => $response['id']]);
    }
    
    /** @test */
    public function validation_enseignants(){
        $this->withExceptionHandling();
        $this->postJson(route("enseignants.store"))
             ->assertUnprocessable()
             ->assertJsonValidationErrors(
                [
                    'matricule',
                    'nom_enseignant',
                    'taux_horaire',
                    'nb_heure',
                ]);
    }
    
    /** @test */
    public function update_enseignants(){
        $enseignants = Enseignant::factory()->create();
        $response = $this->putJson(route("enseignants.update", $enseignants->id),[
            'taux_horaire' => 5000000
        ])->assertOk()->json();

        $this->assertDatabaseHas("enseignants",
        [
            "taux_horaire" => $response['taux_horaire'],
        ]);
    }
    
    /** @test */
    public function delete_enseignants(){
        $enseignants = Enseignant::factory()->create();
        $response = $this->deleteJson(route("enseignants.delete", $enseignants->id))->assertNoContent();
        $this->assertDatabaseMissing("enseignants",["nom_enseignant" => $enseignants->nom_enseignant]);
    }

    /** @test */
    public function calcul_prestation_totale(){
        $enseignant1 = Enseignant::factory()->create();
        $enseignant2 = Enseignant::factory()->create(
            [
                'nb_heure' => 15
            ]);
        $response = $this->getJson(route("enseignants.prestation.totale"))->json();
        $this->assertEquals(1,count($response));
    }
}
