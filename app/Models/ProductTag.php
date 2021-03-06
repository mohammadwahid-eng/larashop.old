<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductTag extends Model
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
        'description',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The products that belong to the tag.
     */
    public function products() {
        return $this->belongsToMany(ProductTag::class, 'product_tag', 'tag_id', 'product_id')->withTimestamps();
    }
}
