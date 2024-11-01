<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $score = [
            ['result_id' => 1, 'question_id' => 1],
            ['result_id' => 1, 'question_id' => 10],
            ['result_id' => 1, 'question_id' => 19],
            ['result_id' => 2, 'question_id' => 3],
            ['result_id' => 2, 'question_id' => 12],
            ['result_id' => 2, 'question_id' => 21],
            ['result_id' => 3, 'question_id' => 2],
            ['result_id' => 3, 'question_id' => 11],
            ['result_id' => 3, 'question_id' => 20],
            ['result_id' => 4, 'question_id' => 5],
            ['result_id' => 4, 'question_id' => 14],
            ['result_id' => 4, 'question_id' => 23],
            ['result_id' => 5, 'question_id' => 4],
            ['result_id' => 5, 'question_id' => 13],
            ['result_id' => 5, 'question_id' => 22],
            ['result_id' => 6, 'question_id' => 6],
            ['result_id' => 6, 'question_id' => 15],
            ['result_id' => 6, 'question_id' => 24],
            ['result_id' => 7, 'question_id' => 8],
            ['result_id' => 7, 'question_id' => 17],
            ['result_id' => 7, 'question_id' => 26],
            ['result_id' => 8, 'question_id' => 7],
            ['result_id' => 8, 'question_id' => 16],
            ['result_id' => 8, 'question_id' => 25],
            ['result_id' => 9, 'question_id' => 9],
            ['result_id' => 9, 'question_id' => 18],
            ['result_id' => 9, 'question_id' => 27],
        ];

        DB::table('scores')->insert($score);
    }
}