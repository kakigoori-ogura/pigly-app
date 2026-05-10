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

        $target = DB::table('weight_targets')
            ->where('user_id', Auth::id())
            ->value('target_weight');

        return view('weight_logs.index', compact('logs', 'target'));
    }

    // ログ追加
    public function store(Request $request)
    {
        $request->validate([
        'weight' => 'required|numeric',
        'date' => 'required|date',
    ]);
        DB::table('weight_logs')->insert([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/logs');
    }

    // 初期登録画面
    public function initial()
    {
        return view('weight_logs.initial');
    }

    // 初期登録保存
   public function initialStore(Request $request)
{
    $request->validate([
        'weight' => 'required|numeric',
        'target_weight' => 'required|numeric',
    ]);

    DB::table('weight_targets')->insert([
        'user_id' => Auth::id(),
        'target_weight' => $request->target_weight,
    ]);

    DB::table('weight_logs')->insert([
        'user_id' => Auth::id(),
        'date' => now(),
        'weight' => $request->weight,
    ]);

    return redirect('/logs');
}
}
