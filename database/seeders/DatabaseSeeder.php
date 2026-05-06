<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ユーザー作成
        $userId = DB::table('users')->insertGetId([
            'name' => 'テスト太郎',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 目標体重
        DB::table('weight_targets')->insert([
            'user_id' => $userId,
            'target_weight' => 50.0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 体重ログ
        DB::table('weight_logs')->insert([
            [
                'user_id' => $userId,
                'date' => '2026-05-01',
                'weight' => 55.0,
                'calories' => 1800,
                'exercise_time' => 30,
                'exercise_content' => 'ウォーキング',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'date' => '2026-05-02',
                'weight' => 54.5,
                'calories' => 1700,
                'exercise_time' => 20,
                'exercise_content' => 'ジョギング',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'date' => '2026-05-03',
                'weight' => 54.0,
                'calories' => null,
                'exercise_time' => null,
                'exercise_content' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
