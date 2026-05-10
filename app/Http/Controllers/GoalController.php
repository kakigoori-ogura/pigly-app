<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function edit()
{
    return view('goal.edit');
}
public function update(Request $request)
{
    $request->validate([
        'target_weight' => 'required|numeric'
    ]);

    DB::table('weight_targets')->updateOrInsert(
    ['user_id' => Auth::id()],
    ['target_weight' => $request->target_weight]
);

    return redirect('/logs');
}
}
