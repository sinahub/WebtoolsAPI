<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisation;


class OrganisationController extends Controller
{
    public function getAllOrganisations() {
        $organisations = Organisation::get()->toJson(JSON_PRETTY_PRINT);
        return response($organisations, 200);
    }

    public function createOrganisation(Request $request) {
        $organisation = new Organisation;
        $organisation->name = $request->name;
        $organisation->save();

        return response()->json([
            "message" => "One organisation added."
        ], 201);
    }

    public function getOrganisation($id) {
        if (Organisation::where('id', $id)->exists()) {
            $organisation = Organisation::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($organisation, 200);
          } else {
            return response()->json([
              "message" => "Organisation not found"
            ], 404);
          }
    }

    public function updateOrganisation(Request $request, $id) {

    }

    public function deleteOrganisation ($id) {
        
    }
}
