<?php

namespace App\Models;

use App\Models\User;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assessment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'assessments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'result_id',
        'name',
        'birth_date',
        'hobby',
        'result'
    ];

    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
