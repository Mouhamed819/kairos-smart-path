<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KairosTest extends TestCase
{
    use RefreshDatabase;

    // Test 1 : Page login accessible
    public function test_login_page_accessible()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    // Test 2 : Inscription fonctionne
    public function test_inscription_fonctionne()
    {
        $response = $this->post('/register', [
            'name'                  => 'Test Etudiant',
            'email'                 => 'test@ucao.com',
            'password'              => 'password123',
            'password_confirmation' => 'password123',
        ]);
        $response->assertRedirect('/dashboard');
    }

    // Test 3 : Dashboard inaccessible sans connexion
    public function test_dashboard_sans_connexion()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    // Test 4 : Dashboard accessible avec connexion
    public function test_dashboard_avec_connexion()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }

    // Test 5 : Page ajout note accessible
    public function test_page_ajout_note_accessible()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/notes/create');
        $response->assertStatus(200);
    }

    // Test 6 : Ajout note fonctionne
    public function test_ajout_note_fonctionne()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->post('/notes', [
            'matiere'     => 'PHP/Laravel',
            'note'        => 15,
            'coefficient' => 3,
            'absences'    => 0,
        ]);
        $response->assertRedirect('/dashboard');
    }

    // Test 7 : Ajout groupe fonctionne
    public function test_ajout_groupe_fonctionne()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->post('/groupes', [
            'nom'        => 'Laravel Experts',
            'matiere'    => 'PHP/Laravel',
            'type'       => 'tutorat',
            'jour'       => '2026-05-01',
            'heure'      => '14:00',
            'taille_max' => 4,
        ]);
        $response->assertRedirect('/dashboard');
    }
}