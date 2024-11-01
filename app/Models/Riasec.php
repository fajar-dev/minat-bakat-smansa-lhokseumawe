<?php

namespace App\Models;

use App\Models\Result;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riasec extends Model
{
    use HasFactory;
    protected $table = 'riasecs';

    protected $fillable = [
        'section',
        'result_id',
        'question_id',
    ];

    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
