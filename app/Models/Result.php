<?php

namespace App\Models;

use App\Models\Recomended;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'results';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'content',
        'category',
        'development_area'
    ];

    public function recomended(): HasMany
    {
        return $this->hasMany(Recomended::class);
    }

    public function intelligenceAssessment(): HasMany
    {
        return $this->hasMany(Assessment::class, 'intelligence_id', 'id');
    }

    public function personalityAssessment(): HasMany
    {
        return $this->hasMany(Assessment::class, 'personality_id', 'id');
    }
}
