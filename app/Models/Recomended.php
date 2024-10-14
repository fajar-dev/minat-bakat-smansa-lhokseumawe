<?php

namespace App\Models;

use App\Models\Result;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recomended extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'recomendeds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'result_id',
        'organization_id',
    ];

    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
