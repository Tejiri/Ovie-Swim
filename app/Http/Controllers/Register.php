<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    //
    function registerPage()
    {
        return view('register');
    }

    function registerUserDashboardPage()
    {
        return view('register-user');
    }
    function registerChild(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'required|date|before:-5 years',
            'address' => 'required',
            'postCode' => 'required',
            'number' => 'required|numeric',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $password = Hash::make($request->password);

        User::create([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'dateOfBirth' => $request->dateOfBirth,
            'address' => $request->address,
            'postCode' => $request->postCode,
            'number' => $request->number,
            'role' => "swimmer",
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => $password,
            'parent' => Auth::user()->id
        ]);

        return back()->withInput()->with("message", "Child Registered Successfully");
    }
    function registerUser(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'required|date|before:-18 years',
            'address' => 'required',
            'postCode' => 'required',
            'role' => 'required',
            'number' => 'required|numeric',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $password = Hash::make($request->password);

        User::create([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'dateOfBirth' => $request->dateOfBirth,
            'address' => $request->address,
            'postCode' => $request->postCode,
            'number' => $request->number,
            'role' => $request->role,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => $password,
        ]);

        return back()->withInput()->with("message", "Registered Successfully");
    }
}
