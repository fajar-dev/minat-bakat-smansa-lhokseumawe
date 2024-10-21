<?php

namespace App\Models;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationRegistration extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'organization_registrations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'organization_id',
        'reason'
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
