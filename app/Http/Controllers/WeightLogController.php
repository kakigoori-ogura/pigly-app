<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WeightLogController extends Controller
{
public function index()
{
    $logs = DB::table('weight_logs')
    ->where('user_id', Auth::id())
    ->get();

    return view('weight_logs.index', compact('logs'));
}
public function store(Request $request)
{
    DB::table('weight_logs')->insert([
    'user_id' => Auth::id(),
    'date' => now(),
    'weight' => $request->weight,
    'created_at' => now(),
    'updated_at' => now(),
    ]);
    return redirect('/logs');
}
public function create()
{
    return view('weight_logs.create');
}
}
