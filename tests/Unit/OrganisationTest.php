<?php

namespace Tests\Unit;

use App\Organisation;
use PHPUnit\Framework\TestCase;

class OrganisationTest extends TestCase
{
    public function test_can_create_organisation() {

        $data = [
            'name' => $this->faker->name,
        ];

        $this->post(route('organisation.createOrganisation'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    // public function test_can_update_organisation() {

    //     $organisation = factory(Organisation::class)->create();

    //     $data = [
    //         'title' => $this->faker->sentence,
    //         'content' => $this->faker->paragraph
    //     ];

    //     $this->put(route('organisations.update', $organisation->id), $data)
    //         ->assertStatus(200)
    //         ->assertJson($data);
    // }

    // public function test_can_show_organisation() {

    //     $organisation = factory(Organisation::class)->create();

    //     $this->get(route('organisations.show', $organisation->id))
    //         ->assertStatus(200);
    // }

    // public function test_can_delete_organisation() {

    //     $organisation = factory(Organisation::class)->create();

    //     $this->delete(route('organisations.delete', $organisation->id))
    //         ->assertStatus(204);
    // }

    // public function test_can_list_organisations() {
    //     $organisations = factory(Organisation::class, 2)->create()->map(function ($organisation) {
    //         return $organisation->only(['id', 'title', 'content']);
    //     });

    //     $this->get(route('organisations'))
    //         ->assertStatus(200)
    //         ->assertJson($organisations->toArray())
    //         ->assertJsonStructure([
    //             '*' => [ 'id', 'title', 'content' ],
    //         ]);
    // }
}