<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationCategory extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'organization_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function organization(): HasMany
    {
        return $this->hasMany(Organization::class);
    }
}
