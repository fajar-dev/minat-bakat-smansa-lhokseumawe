<?php

namespace App\Models;

use App\Models\User;
use App\Models\Result;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrganizationRegistration;
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
        'uuid',
        'user_id',
        'intelligence_id',
        'personality_id',
        'name',
        'birth_date',
        'hobby',
        'mis_results',
        'riasec_results'
    ];

    public function intelligence(): BelongsTo
    {
        return $this->belongsTo(Result::class, 'intelligence_id', 'id');
    }

    public function personality(): BelongsTo
    {
        return $this->belongsTo(Result::class, 'personality_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }
}
