<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\TrainingResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingResultController extends Controller
{
    //

    function uploadResultPage() {
        $time = [];
        for ($i = 0; $i < 61; $i++) {
            array_push($time, $i);
            // $time->append
        }
        if (Auth::user()->role == 'admin') {
            $users = User::where('role', 'swimmer')->get();
        } elseif (Auth::user()->role == 'coach') {
            $users = User::where('role', 'swimmer')->where("squadId", Auth::user()->squadId)->get();
        }


        return view('upload-result', compact("users", "time"));
    }

    public function addResult(Request $request)
    {
        $timeInSec = 0;
        $this->validate($request, [
            "trainingDate" => 'required',
            "distance" => 'required',
            "strokeType" => 'required',
        ]);

        if ($request->minutes != null) {
            $timeInSec = $request->minutes * 60;
        }

        $timeInSec = $timeInSec + $request->seconds;

        // $swimmer = User::where('id', $request->swimmer)->where('role', 'swimmer')->first();


        TrainingResult::create([
            'timeInSeconds' => $timeInSec,
            'trainingDate' => $request->trainingDate,
            'distance' => $request->distance,
            'strokeType' => $request->strokeType,
            'userId' => $request->userId,
            'validated' => Auth::user()->role  ==  "admin" ? 1 : 0
        ]);

        return back()->withInput()->with('message', "Training result successfully uploaded");
    }

    function viewResultsPage() {
        $squads = Squad::all();
        $squad = null;

        $squads = Squad::all();
        $trainingResults = null;
        $trainingResults100m = null;
        $trainingResults200m = null;
        $trainingResults400m = null;
        $trainingResults800m = null;
        return view('view-results', compact("squad", "squads", "trainingResults", "trainingResults100m", "trainingResults200m", "trainingResults400m", "trainingResults800m"));
    }
    public function viewResults(Request $request)
    {
        //    return $request;
        return redirect('view-results/'  . $request->squadId);
    }


    function viewSquadResult($squadId)
    {
        $squads = Squad::all();
        $squad = Squad::where('id', $squadId)->first();
        $trainingResults = TrainingResult::all();
        $trainingResults100m = TrainingResult::where('distance', '100m')->where('validated', 1)->get();
        $trainingResults200m = TrainingResult::where('distance', '200m')->where('validated', 1)->get();
        $trainingResults400m = TrainingResult::where('distance', '400m')->where('validated', 1)->get();
        $trainingResults800m = TrainingResult::where('distance', '800m')->where('validated', 1)->get();
        return view('view-results', compact("squads", "squad", "trainingResults", "trainingResults100m", "trainingResults200m", "trainingResults400m", "trainingResults800m"));
    }
}
