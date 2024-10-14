<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'results';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'content',
        'development_area'
    ];
}
