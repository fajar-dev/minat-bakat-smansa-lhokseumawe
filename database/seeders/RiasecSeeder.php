<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RiasecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riasec = [
            // Bagian I
            ['section' => 1, 'result_id' => 10, 'question_id' => 38],
            ['section' => 1, 'result_id' => 10, 'question_id' => 39],
            ['section' => 1, 'result_id' => 10, 'question_id' => 40],
            ['section' => 1, 'result_id' => 10, 'question_id' => 41],
            ['section' => 1, 'result_id' => 10, 'question_id' => 42],
            ['section' => 1, 'result_id' => 10, 'question_id' => 43],
            ['section' => 1, 'result_id' => 10, 'question_id' => 44],
            ['section' => 1, 'result_id' => 10, 'question_id' => 45],
            ['section' => 1, 'result_id' => 10, 'question_id' => 46],
            ['section' => 1, 'result_id' => 10, 'question_id' => 47],
            
            // Bagian I (kategori A)
            ['section' => 1, 'result_id' => 11, 'question_id' => 48],
            ['section' => 1, 'result_id' => 11, 'question_id' => 49],
            ['section' => 1, 'result_id' => 11, 'question_id' => 50],
            ['section' => 1, 'result_id' => 11, 'question_id' => 51],
            ['section' => 1, 'result_id' => 11, 'question_id' => 52],
            ['section' => 1, 'result_id' => 11, 'question_id' => 53],
            ['section' => 1, 'result_id' => 11, 'question_id' => 54],
            ['section' => 1, 'result_id' => 11, 'question_id' => 55],
            ['section' => 1, 'result_id' => 11, 'question_id' => 56],
            ['section' => 1, 'result_id' => 11, 'question_id' => 57],
            ['section' => 1, 'result_id' => 11, 'question_id' => 58],
            
            // Bagian I (kategori S)
            ['section' => 1, 'result_id' => 12, 'question_id' => 59],
            ['section' => 1, 'result_id' => 12, 'question_id' => 60],
            ['section' => 1, 'result_id' => 12, 'question_id' => 61],
            ['section' => 1, 'result_id' => 12, 'question_id' => 62],
            ['section' => 1, 'result_id' => 12, 'question_id' => 63],
            ['section' => 1, 'result_id' => 12, 'question_id' => 64],
            ['section' => 1, 'result_id' => 12, 'question_id' => 65],
            ['section' => 1, 'result_id' => 12, 'question_id' => 66],
            ['section' => 1, 'result_id' => 12, 'question_id' => 67],
            ['section' => 1, 'result_id' => 12, 'question_id' => 68],
            ['section' => 1, 'result_id' => 12, 'question_id' => 69],
            
            // Bagian I (kategori E)
            ['section' => 1, 'result_id' => 13, 'question_id' => 70],
            ['section' => 1, 'result_id' => 13, 'question_id' => 71],
            ['section' => 1, 'result_id' => 13, 'question_id' => 72],
            ['section' => 1, 'result_id' => 13, 'question_id' => 73],
            ['section' => 1, 'result_id' => 13, 'question_id' => 74],
            ['section' => 1, 'result_id' => 13, 'question_id' => 75],
            ['section' => 1, 'result_id' => 13, 'question_id' => 76],
            ['section' => 1, 'result_id' => 13, 'question_id' => 77],
            ['section' => 1, 'result_id' => 13, 'question_id' => 78],
            ['section' => 1, 'result_id' => 13, 'question_id' => 79],
            ['section' => 1, 'result_id' => 13, 'question_id' => 80],
            
            // Bagian I (kategori C)
            ['section' => 1, 'result_id' => 14, 'question_id' => 81],
            ['section' => 1, 'result_id' => 14, 'question_id' => 82],
            ['section' => 1, 'result_id' => 14, 'question_id' => 83],
            ['section' => 1, 'result_id' => 14, 'question_id' => 84],
            ['section' => 1, 'result_id' => 14, 'question_id' => 85],
            ['section' => 1, 'result_id' => 14, 'question_id' => 86],
            ['section' => 1, 'result_id' => 14, 'question_id' => 87],
            ['section' => 1, 'result_id' => 14, 'question_id' => 88],
            ['section' => 1, 'result_id' => 14, 'question_id' => 89],
            ['section' => 1, 'result_id' => 14, 'question_id' => 90],
            ['section' => 1, 'result_id' => 14, 'question_id' => 91],

            // Bagian II
            // R
            ['section' => 2, 'result_id' => 10, 'question_id' => 92],
            ['section' => 2, 'result_id' => 10, 'question_id' => 93],
            ['section' => 2, 'result_id' => 10, 'question_id' => 94],
            ['section' => 2, 'result_id' => 10, 'question_id' => 95],
            ['section' => 2, 'result_id' => 10, 'question_id' => 96],
            ['section' => 2, 'result_id' => 10, 'question_id' => 97],
            ['section' => 2, 'result_id' => 10, 'question_id' => 98],
            ['section' => 2, 'result_id' => 10, 'question_id' => 99],
            ['section' => 2, 'result_id' => 10, 'question_id' => 100],
            ['section' => 2, 'result_id' => 10, 'question_id' => 101],
            
            // I
            ['section' => 2, 'result_id' => 11, 'question_id' => 102],
            ['section' => 2, 'result_id' => 11, 'question_id' => 103],
            ['section' => 2, 'result_id' => 11, 'question_id' => 104],
            ['section' => 2, 'result_id' => 11, 'question_id' => 105],
            ['section' => 2, 'result_id' => 11, 'question_id' => 106],
            ['section' => 2, 'result_id' => 11, 'question_id' => 107],
            ['section' => 2, 'result_id' => 11, 'question_id' => 108],
            ['section' => 2, 'result_id' => 11, 'question_id' => 109],
            ['section' => 2, 'result_id' => 11, 'question_id' => 110],
            ['section' => 2, 'result_id' => 11, 'question_id' => 111],
            ['section' => 2, 'result_id' => 11, 'question_id' => 112],
            
            // A
            ['section' => 2, 'result_id' => 12, 'question_id' => 113],
            ['section' => 2, 'result_id' => 12, 'question_id' => 114],
            ['section' => 2, 'result_id' => 12, 'question_id' => 115],
            ['section' => 2, 'result_id' => 12, 'question_id' => 116],
            ['section' => 2, 'result_id' => 12, 'question_id' => 117],
            ['section' => 2, 'result_id' => 12, 'question_id' => 118],
            ['section' => 2, 'result_id' => 12, 'question_id' => 119],
            ['section' => 2, 'result_id' => 12, 'question_id' => 120],
            ['section' => 2, 'result_id' => 12, 'question_id' => 121],
            ['section' => 2, 'result_id' => 12, 'question_id' => 122],
            
            // S
            ['section' => 2, 'result_id' => 13, 'question_id' => 123],
            ['section' => 2, 'result_id' => 13, 'question_id' => 124],
            ['section' => 2, 'result_id' => 13, 'question_id' => 125],
            ['section' => 2, 'result_id' => 13, 'question_id' => 126],
            ['section' => 2, 'result_id' => 13, 'question_id' => 127],
            ['section' => 2, 'result_id' => 13, 'question_id' => 128],
            ['section' => 2, 'result_id' => 13, 'question_id' => 129],
            ['section' => 2, 'result_id' => 13, 'question_id' => 130],
            ['section' => 2, 'result_id' => 13, 'question_id' => 131],
            ['section' => 2, 'result_id' => 13, 'question_id' => 132],
            ['section' => 2, 'result_id' => 13, 'question_id' => 133],
            
            // E
            ['section' => 2, 'result_id' => 14, 'question_id' => 134],
            ['section' => 2, 'result_id' => 14, 'question_id' => 135],
            ['section' => 2, 'result_id' => 14, 'question_id' => 136],
            ['section' => 2, 'result_id' => 14, 'question_id' => 137],
            ['section' => 2, 'result_id' => 14, 'question_id' => 138],
            ['section' => 2, 'result_id' => 14, 'question_id' => 139],
            ['section' => 2, 'result_id' => 14, 'question_id' => 140],
            ['section' => 2, 'result_id' => 14, 'question_id' => 141],
            ['section' => 2, 'result_id' => 14, 'question_id' => 142],
            ['section' => 2, 'result_id' => 14, 'question_id' => 143],
            ['section' => 2, 'result_id' => 14, 'question_id' => 144],
            
            // C
            ['section' => 2, 'result_id' => 15, 'question_id' => 145],
            ['section' => 2, 'result_id' => 15, 'question_id' => 146],
            ['section' => 2, 'result_id' => 15, 'question_id' => 147],
            ['section' => 2, 'result_id' => 15, 'question_id' => 148],
            ['section' => 2, 'result_id' => 15, 'question_id' => 149],
            ['section' => 2, 'result_id' => 15, 'question_id' => 150],
            ['section' => 2, 'result_id' => 15, 'question_id' => 151],
            ['section' => 2, 'result_id' => 15, 'question_id' => 152],
            ['section' => 2, 'result_id' => 15, 'question_id' => 153],
            ['section' => 2, 'result_id' => 15, 'question_id' => 154],
            ['section' => 2, 'result_id' => 15, 'question_id' => 155],

              // Bagian III
            // R
            ['section' => 3, 'result_id' => 10, 'question_id' => 156],
            ['section' => 3, 'result_id' => 10, 'question_id' => 157],
            ['section' => 3, 'result_id' => 10, 'question_id' => 158],
            ['section' => 3, 'result_id' => 10, 'question_id' => 159],
            ['section' => 3, 'result_id' => 10, 'question_id' => 160],
            ['section' => 3, 'result_id' => 10, 'question_id' => 161],
            ['section' => 3, 'result_id' => 10, 'question_id' => 162],
            ['section' => 3, 'result_id' => 10, 'question_id' => 163],
            ['section' => 3, 'result_id' => 10, 'question_id' => 164],
            ['section' => 3, 'result_id' => 10, 'question_id' => 165],
            ['section' => 3, 'result_id' => 10, 'question_id' => 166],
            ['section' => 3, 'result_id' => 10, 'question_id' => 167],
            ['section' => 3, 'result_id' => 10, 'question_id' => 168],

            
            // I
            ['section' => 3, 'result_id' => 11, 'question_id' => 169],
            ['section' => 3, 'result_id' => 11, 'question_id' => 170],
            ['section' => 3, 'result_id' => 11, 'question_id' => 171],
            ['section' => 3, 'result_id' => 11, 'question_id' => 172],
            ['section' => 3, 'result_id' => 11, 'question_id' => 173],
            ['section' => 3, 'result_id' => 11, 'question_id' => 174],
            ['section' => 3, 'result_id' => 11, 'question_id' => 175],
            ['section' => 3, 'result_id' => 11, 'question_id' => 176],
            ['section' => 3, 'result_id' => 11, 'question_id' => 177],
            ['section' => 3, 'result_id' => 11, 'question_id' => 178],
            ['section' => 3, 'result_id' => 11, 'question_id' => 179],
            ['section' => 3, 'result_id' => 11, 'question_id' => 180],
            ['section' => 3, 'result_id' => 11, 'question_id' => 181],
            ['section' => 3, 'result_id' => 11, 'question_id' => 182],


            // A
            ['section' => 3, 'result_id' => 12, 'question_id' => 183],
            ['section' => 3, 'result_id' => 12, 'question_id' => 184],
            ['section' => 3, 'result_id' => 12, 'question_id' => 185],
            ['section' => 3, 'result_id' => 12, 'question_id' => 186],
            ['section' => 3, 'result_id' => 12, 'question_id' => 187],
            ['section' => 3, 'result_id' => 12, 'question_id' => 188],
            ['section' => 3, 'result_id' => 12, 'question_id' => 189],
            ['section' => 3, 'result_id' => 12, 'question_id' => 190],
            ['section' => 3, 'result_id' => 12, 'question_id' => 191],
            ['section' => 3, 'result_id' => 12, 'question_id' => 192],
            ['section' => 3, 'result_id' => 12, 'question_id' => 193],
            ['section' => 3, 'result_id' => 12, 'question_id' => 194],
            ['section' => 3, 'result_id' => 12, 'question_id' => 195],
            ['section' => 3, 'result_id' => 12, 'question_id' => 196],


            // S
            ['section' => 3, 'result_id' => 13, 'question_id' => 197],
            ['section' => 3, 'result_id' => 13, 'question_id' => 198],
            ['section' => 3, 'result_id' => 13, 'question_id' => 199],
            ['section' => 3, 'result_id' => 13, 'question_id' => 200],
            ['section' => 3, 'result_id' => 13, 'question_id' => 201],
            ['section' => 3, 'result_id' => 13, 'question_id' => 202],
            ['section' => 3, 'result_id' => 13, 'question_id' => 203],
            ['section' => 3, 'result_id' => 13, 'question_id' => 204],
            ['section' => 3, 'result_id' => 13, 'question_id' => 205],
            ['section' => 3, 'result_id' => 13, 'question_id' => 206],
            ['section' => 3, 'result_id' => 13, 'question_id' => 207],
            ['section' => 3, 'result_id' => 13, 'question_id' => 208],
            ['section' => 3, 'result_id' => 13, 'question_id' => 209],

            // E
            ['section' => 3, 'result_id' => 14, 'question_id' => 210],
            ['section' => 3, 'result_id' => 14, 'question_id' => 211],
            ['section' => 3, 'result_id' => 14, 'question_id' => 212],
            ['section' => 3, 'result_id' => 14, 'question_id' => 213],
            ['section' => 3, 'result_id' => 14, 'question_id' => 214],
            ['section' => 3, 'result_id' => 14, 'question_id' => 215],
            ['section' => 3, 'result_id' => 14, 'question_id' => 216],
            ['section' => 3, 'result_id' => 14, 'question_id' => 217],
            ['section' => 3, 'result_id' => 14, 'question_id' => 218],
            ['section' => 3, 'result_id' => 14, 'question_id' => 219],
            ['section' => 3, 'result_id' => 14, 'question_id' => 220],
            ['section' => 3, 'result_id' => 14, 'question_id' => 221],
            ['section' => 3, 'result_id' => 14, 'question_id' => 222],
            ['section' => 3, 'result_id' => 14, 'question_id' => 223],

            // C
            ['section' => 3, 'result_id' => 15, 'question_id' => 224],
            ['section' => 3, 'result_id' => 15, 'question_id' => 225],
            ['section' => 3, 'result_id' => 15, 'question_id' => 226],
            ['section' => 3, 'result_id' => 15, 'question_id' => 227],
            ['section' => 3, 'result_id' => 15, 'question_id' => 228],
            ['section' => 3, 'result_id' => 15, 'question_id' => 229],
            ['section' => 3, 'result_id' => 15, 'question_id' => 230],
            ['section' => 3, 'result_id' => 15, 'question_id' => 231],
            ['section' => 3, 'result_id' => 15, 'question_id' => 232],
            ['section' => 3, 'result_id' => 15, 'question_id' => 233],
            ['section' => 3, 'result_id' => 15, 'question_id' => 234],
            ['section' => 3, 'result_id' => 15, 'question_id' => 235],
            ['section' => 3, 'result_id' => 15, 'question_id' => 236],
            ['section' => 3, 'result_id' => 15, 'question_id' => 237],

        ];

        DB::table('riasecs')->insert($riasec);
    }
}
