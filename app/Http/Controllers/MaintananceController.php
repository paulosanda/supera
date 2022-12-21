<?php

namespace App\Http\Controllers;

use App\Models\Maintanance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintananceController extends Controller
{
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $today = date('Y-m-d');
        $request->validate([
            'user_vechicle_id' => 'required',
            'maintanance_vechicle_id' => 'required',
            'type_maintanance' => 'required|string',
            'date' => "after:$today|required|date",
        ]);

        Maintanance::create([
            'user_id' => Auth::user()->id,
            'vechicle_id' => $request->maintanance_vechicle_id,
            'user_vechicle_id' => $request->user_vechicle_id,
            'type_maintanance' => $request->type_maintanance,
            'next_maintanance' => $request->date,
        ]);

        return redirect()->route('vechicles');
    }
}
