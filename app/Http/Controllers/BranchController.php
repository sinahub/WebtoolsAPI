<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Organisation;


class BranchController extends Controller
{
    public function getAllBranches() {
        $branches = Branch::with('organisation')->get()->toJson(JSON_PRETTY_PRINT);
        return response($branches, 200);
    }

    public function createBranch(Request $request) {
        if (Organisation::where('id', $request->organisation_id)->exists()) {
            $branch = new Branch;
            $branch->name = $request->name;
            $branch->organisation_id = $request->organisation_id;
            $branch->save();
   
            return response()->json([ "message" => "Congratulations! New branch added." ], 201);
        
        } else {
           
            $org_id = Organisation::get()->pluck('id');
            return response()->json([ "message" => "Organisation not found.",
                                        "available_organization_ids" => $org_id->toJson() ], 404);
        }
    }

    public function getBranch($id) {

    }

    public function updateBranch(Request $request, $id) {
    
    }

    public function deleteBranch ($id) {
    
    }
}
