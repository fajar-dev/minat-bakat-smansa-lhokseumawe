<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'answers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'assessment_id',
        'question_id',
        'value'
    ];

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
