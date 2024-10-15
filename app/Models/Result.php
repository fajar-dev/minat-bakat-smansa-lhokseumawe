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
        'development_area'
    ];

    public function recomended(): HasMany
    {
        return $this->hasMany(Recomended::class);
    }
}
