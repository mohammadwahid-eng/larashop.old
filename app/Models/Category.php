<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'is_featured',
        'in_menu',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'parent_id'   => 'integer',
        'is_featured' => 'boolean',
        'in_menu'     => 'boolean',
    ];

    /**
     * Get the parent of the category.
     */
    public function parent() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the children of the category.
     */
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }


}
