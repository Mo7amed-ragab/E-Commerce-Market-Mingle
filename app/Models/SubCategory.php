<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory,SoftDeletes};
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function create_user() 
    {
        return $this->belongsTo(User::class , 'create_user_id', 'id');
    }

    public function update_user()
    {
        return $this->belongsTo(User::class ,'update_user_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
