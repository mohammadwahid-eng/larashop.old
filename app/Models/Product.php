<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'status',
        'featured',
        'regular_price',
        'sale_price',
        'sku',
        'in_stock',
        'weight',
        'length',
        'width',
        'height',
        'upsell_ids',
        'cross_sell_ids',
        'reviews_allowed',
        'purchase_note',
        'tax_status',
        'tax_class_id',
        'shipping_class_id',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The categories that belong to the product.
     */
    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'category_id')->withTimestamps();
    }

    /**
     * The tags that belong to the product.
     */
    public function tags() {
        return $this->belongsToMany(ProductTag::class, 'product_tag', 'product_id', 'tag_id')->withTimestamps();
    }

    /**
     * The attributes that belong to the product.
     */
    public function attrs() {
        return $this->belongsToMany(ProductAttribute::class, 'attribute_product', 'product_id', 'attribute_id')->withTimestamps();
    }
    
}
