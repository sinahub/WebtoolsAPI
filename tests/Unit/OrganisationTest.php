<?php

namespace Tests\Unit;

use App\Organisation;
use Tests\TestCase;

class OrganisationTest extends TestCase
{
    
    public function test_can_create_organisation() {

        $data = [
            'name' => $this->faker->name,
        ];

        $this->post(route('createOrganisation'), $data)
            ->assertStatus(201);
    }

    public function test_can_update_organisation() {

        $organisation = factory(Organisation::class)->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $this->put(route('organisationsUpdate', $organisation->id), $data)
            ->assertStatus(200);
    }

    public function test_can_show_organisation() {

        $organisation = factory(Organisation::class)->create();

        $this->get(route('organisation', $organisation->id))
            ->assertStatus(200);
    }

    public function test_can_delete_organisation() {

        $organisation = factory(Organisation::class)->create();

        $this->delete(route('organisationsDelete', $organisation->id))
            ->assertStatus(202);
    }

    public function test_can_list_organisations() {
        $organisations = factory(Organisation::class, 2)->create()->map(function ($organisation) {
            return $organisation->only(['id', 'title', 'content']);
        });

        $this->get(route('organisations'))
            ->assertStatus(200);
    }
}