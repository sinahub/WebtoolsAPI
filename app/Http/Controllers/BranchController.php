<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Organisation;


class BranchController extends Controller
{
    public function getAllBranches() {
        // TODO include dates if business asks for
        $branches = Branch::with(array('organisation'=>function($query){
            $query->select('id','name');
        }))->get(['id','name', 'organisation_id'])->toJson();
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
        if (Branch::where('id', $id)->exists()) {
            $branch = Branch::with('organisation')->where('id', $id)->get()->toJson();
            
            return response($branch, 200);
          
        } else {
            return response()->json([ "message" => "Branch not found" ], 404);
        }
    }

    public function updateBranch(Request $request, $id) {
        if (Branch::where('id', $id)->exists()) {
            $branch = Branch::find($id);
            $branch->name = is_null($request->name) ? $branch->name : $request->name;
            // checks if Organisation ID provided.
            if(!is_null($request->organisation_id)){ 
                
                // checks if Organisation ID Exists
                if(Organisation::where('id', $request->organisation_id)->exists()){
                    $branch->organisation_id = $request->organisation_id;
                } else {
                    $org_id = Organisation::get()->pluck('id');
                    return response()->json([ "message" => "Organisation not found. Available organisation id's are: $org_id",
                                                "available_organization_ids" => $org_id->toJson() ], 404);
                }
            } else {
                // original value
                $branch->organisation_id = $branch->organisation_id;
            }
        $branch->save();
    
        return response()->json([ "message" => "records updated successfully" ], 200);
        
        } else {
            return response()->json([ "message" => "Branch not found" ], 404);
        }
    }

    public function deleteBranch ($id) {
        if(Branch::where('id', $id)->exists()) {
            $branch = Branch::find($id);
            //TODO alert if the branch has any staff to avoid unwanted deleting.
            $branch->delete();
    
            return response()->json([ "message" => "record deleted" ], 202);
        } else {
        return response()->json([ "message" => "Branch not found" ], 404);
        }
    }
}
