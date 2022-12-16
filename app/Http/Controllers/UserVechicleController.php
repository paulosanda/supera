<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintanance;
use Auth;

class UserVechicleController extends Controller
{
    public function index()
    {
        $maintanance = Maintanance::with('vechicles')
            ->where('user_id', Auth::user()->id)
            ->where('next_maintance', '<=', date('Y-m-d', strtotime("+7 days")))
            ->orderBy('next_maintance')
            ->get();

        return view('dashboard', compact('maintanance'));
    }
}
