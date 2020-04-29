<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Branch;
use App\Organisation;

class StaffController extends Controller
{
    public function getAllStaff() {
        // TODO tidy up JSON format
        $staff = Staff::with(array('branch.organisation'=>function($query){
            $query->select('id','name');
        }))->get(['id','name', 'branch_id'])->toJson();
        return response($staff, 200);
    }

    // $branches = Branch::with(array('organisation'=>function($query){
    //     $query->select('id','name');
    // }))->get(['id','name', 'organisation_id'])->toJson();

    public function createStaff(Request $request) {
        // check if the branch ID exists
        if (Branch::where('id', $request->branch_id)->exists()) {
            $staff = new Staff;
            $staff->name = $request->name;
            $staff->branch_id = $request->branch_id;
            $staff->save();

            return response()->json([
                "message" => "staff added."
            ], 201);
        } else {
            // Branch ID not existing then provide the available IDs
            $bnch_id = Branch::get()->pluck('id');
            return response()->json([ "message" => "Branch not found.",
                                        "available_branch_ids" => $bnch_id->toJson() ], 404);
        }
    }

    public function getStaff($id) {
        if (Staff::where('id', $id)->exists()) {
            $staff = Staff::with('branch.organisation')->where('id', $id)->get()->toJson();
            // TODO tidy up json format
            return response($staff, 200);
          } else {
            return response()->json([ "message" => "Staff not found" ], 404);
          }
    }

    public function updateStaff(Request $request, $id) {
        if (Staff::where('id', $id)->exists()) {
            $staff = Staff::find($id);
            $staff->name = is_null($request->name) ? $staff->name : $request->name;
            
            // checks if Branch ID provided.
            if(!is_null($request->branch_id)){ 
                
                // checks if Branch ID Exists
                if(Branch::where('id', $request->branch_id)->exists()){
                    $staff->branch_id = $request->branch_id;
                } else {
                    $bnch_id = Branch::get()->pluck('id');
                    return response()->json([ "message" => "Branch not found.",
                                                "available_branch_ids" => $bnch_id->toJson() ], 404);
                }
            } else {
                // original value
                $staff->branch_id = $staff->branch_id;
            }
            
            $staff->save();
    
            return response()->json([ "message" => "records updated successfully" ], 200);
        } else {
        return response()->json([ "message" => "Staff not found" ], 404);
            
        }
    }

    public function deleteStaff ($id) {
        if(Staff::where('id', $id)->exists()) {
            $staff = Staff::find($id);
            $staff->delete();
    
            return response()->json([
              "message" => "record deleted"
            ], 202);
        } else {
        return response()->json([
            "message" => "Staff not found"
        ], 404);
        }
    }
}
