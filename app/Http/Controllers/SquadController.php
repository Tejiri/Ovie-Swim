<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SquadController extends Controller
{
    //

    function editSquadPage($squadId) {
        $squad = Squad::where("id", $squadId)->first();
        return view('edit-squad', compact("squad"));
    }

    function squadDetailsPage($squadId) {
        $squad  =  Squad::where('id', $squadId)->first();
        return view('squad-details', compact("squad"));
    }
    function showSquadManagementPage()
    {
        if (Auth::user()->role == "coach") {
            $squad = Squad::where("id", Auth::user()->squadId)->first();
            // return $squads;
            return view('manage-squads', compact("squad"));
        }
        $squads = Squad::all();
        $users = User::where('role', "!=", "admin")->where('role', "!=", "parent")->where('squadId', null)->get();
        return view('manage-squads', compact("squads", "users"));
    }

    function createSquad(Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => 'required|unique:squads,name',
                "description" => 'required'
            ]
        );

        Squad::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with("message", "Squad created successfully");
    }

    function assignUserToSquad(Request $request)
    {
        // return $request;
        if ($request->user == null || $request->squad == null) {
            return back();
        }
        User::where('id', $request->user)->first()->update(
            ["squadId" => $request->squad]
        );
        // return $user;
        // $this->validate(
        //     $request,
        //     [
        //         "name" => 'required|unique:squads,name',
        //         "description" => 'required'
        //     ]
        // );

        // Squad::create([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);
        return back()->with("squadAssigned", "Squad assigned successfully");
    }

    function updateSquadDetails($squadId, Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => "required",
                "description" => "required"
            ]
        );
        $squad = Squad::where("id", $squadId)->first()->update([
            "name" => $request->name,
            "description" => $request->description
        ]);
        return back()->withInput()->with("message", "Squad details updated successfully");
    }
}
