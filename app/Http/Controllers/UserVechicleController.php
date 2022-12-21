<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintanance;
use App\Models\User;
use App\Models\UserVechicle;
use App\Models\Vechicle;
use Illuminate\Support\Facades\Auth;
use App\Traits\MaintananceTypes;

class UserVechicleController extends Controller
{
    use MaintananceTypes;
    public function index()
    {
        $uservechicles = User::with('vechicles')->where('id', Auth::user()->id)->get();
        $vechicles = Vechicle::all();
        $maintanance = $this->maintanancetypes();

        return view('uservechicles', compact('uservechicles', 'vechicles', 'maintanance'));
    }

    public function uservechicle()
    {
        $uservechicles = User::with('vechicles')->where('id', Auth::user()->id)->get();
        $response = json_encode($uservechicles);
        return ($response);
    }

    public function adduservechicle(Request $request)
    {
        $newvechicle = UserVechicle::create([
            'user_id' => Auth::user()->id,
            'vechicle_id' => $request->vechicle_id,
        ]);
        return response()->json($newvechicle, 200);
    }
    public function maintanance()
    {
        $maintanance = Maintanance::with('vechicles')
            ->where('user_id', Auth::user()->id)
            ->where('next_maintanance', '<=', date('Y-m-d', strtotime("+7 days")))
            ->orderBy('next_maintanance')
            ->get();

        return view('dashboard', compact('maintanance'));
    }

    public function destroy($id): void
    {
        UserVechicle::find($id)->delete();
    }
}
