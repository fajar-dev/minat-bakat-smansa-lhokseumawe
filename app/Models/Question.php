<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'questions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'text',
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
