<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory,SoftDeletes};
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , SoftDeletes; 
    protected $guarded =[] ;
    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class ,'create_user_id');
    }
    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class ,'update_user_id');
    }

    public function subCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
