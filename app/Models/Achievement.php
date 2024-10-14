<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'achievements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'activity_name',
        'date',
        'type',
        'achievement_name',
        'file_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
