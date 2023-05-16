<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    //

    function updateProfilePage()
    {
        $user = Auth::user();
        $date_different = date_diff(new \DateTime($user->dateOfBirth), new \DateTime())->y;
        // return $date_different;
        if (Auth::user()->role == 'swimmer' && $date_different < 18) {
            abort("403", "Less than 18 years old, only Parents can update");
        }
        return view('update-profile', compact("user"));
    }

    function updateProfileWithId(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                "username" => "required",
                "firstName" => "required",
                "lastName" => "required",
                "middleName" => "required",
                "dateOfBirth" => "required",
                "number" => "required",
                "address" => "required",
                "postCode" => "required",
                "gender" => "required",
                "email" => "required"
            ]

        );

        User::where('id', $id)->first()->update([
            "username" => $request->username,
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "middleName" => $request->middleName,
            "dateOfBirth" => $request->dateOfBirth,
            "number" => $request->number,
            "address" => $request->address,
            "postCode" => $request->postCode,
            "gender" => $request->gender,
            "email" => $request->email
        ]);

        return back()->withInput()->with("message", "Profile updated successfully");
    }
    function updateProfile(Request $request)
    {
        // return $request;

        $this->validate(
            $request,
            [
                "username" => "required",
                "firstName" => "required",
                "lastName" => "required",
                "middleName" => "required",
                "dateOfBirth" => "required",
                "number" => "required",
                "address" => "required",
                "postCode" => "required",
                "gender" => "required",
                "email" => "required"
            ]

        );

        User::where('id', Auth::user()->id)->first()->update([
            "username" => $request->username,
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "middleName" => $request->middleName,
            "dateOfBirth" => $request->dateOfBirth,
            "number" => $request->number,
            "address" => $request->address,
            "postCode" => $request->postCode,
            "gender" => $request->gender,
            "email" => $request->email
        ]);

        return back()->withInput()->with("message", "Profile updated successfully");
        // $user = Auth::user();
    }
}
