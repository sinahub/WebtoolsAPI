<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisation;


class OrganisationController extends Controller
{
    public function getAllOrganisations() {
        $organisations = Organisation::get(['id', 'name'])->toJson();
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
            $organisation = Organisation::where('id', $id)->get()->toJson();
            return response($organisation, 200);
          } else {
            return response()->json([
              "message" => "Organisation not found"
            ], 404);
          }
    }

    public function updateOrganisation(Request $request, $id) {
        if (Organisation::where('id', $id)->exists()) {
            $organisation = Organisation::find($id);
            $organisation->name = is_null($request->name) ? $organisation->name : $request->name;
            $organisation->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
        return response()->json([
            "message" => "Organisation not found"
        ], 404);
            
        }
    }

    public function deleteOrganisation ($id) {
        if(Organisation::where('id', $id)->exists()) {
            $organisation = Organisation::find($id);

            // TODO alert if the Organisation has any branch to avoid unwanted deleting.
            $organisation->delete();
    
            return response()->json([
              "message" => "record deleted"
            ], 202);
        } else {
        return response()->json([
            "message" => "Organisation not found"
        ], 404);
        }
    }
}
