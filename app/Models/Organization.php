<?php

namespace App\Models;

use App\Models\Recomended;
use App\Models\OrganizationCategory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrganizationRegistration;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'organizations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'organization_category_id',
        'name',
        'coach',
        'position'
    ];

    public function organizationCategory(): BelongsTo
    {
        return $this->belongsTo(OrganizationCategory::class);
    }

    public function recomended(): HasMany
    {
        return $this->hasMany(Recomended::class);
    }

    public function organizationRegistration(): HasMany
    {
        return $this->hasMany(OrganizationRegistration::class);
    }
}
