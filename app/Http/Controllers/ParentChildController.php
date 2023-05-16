<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentChildController extends Controller
{
    //

    function postManageChild(Request $request) {
        return redirect('manage-kids/'.$request->childId);
    }
    function getManageKidsPage() {
        $children = User::where('parent', Auth::user()->id)->get();
        $selectedChild = null;
        return view('manage-kids',compact('children','selectedChild'));
    }

    function updateChildsPage($childId) {
       
        $children = User::where('parent', Auth::user()->id)->get();
        $selectedChild = User::where('id',$childId)->first();
        return view('manage-kids',compact('children','selectedChild'));
    }
}
