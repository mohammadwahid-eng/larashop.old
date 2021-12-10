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
        'type',
        'status',
        'featured',
        'catalog_visibility',
        'description',
        'short_description',
        'sku',
        'price',
        'regular_price',
        'sale_price',
        'date_on_sale_from',
        'date_on_sale_to',
        'total_sales',
        'tax_status',
        'tax_class',
        'manage_stock',
        'stock_quantity',
        'stock_status',
        'backorders',
        'low_stock_amount',
        'sold_individually',
        'weight',
        'length',
        'width',
        'height',
        'upsell_ids',
        'cross_sell_ids',
        'parent_id',
        'reviews_allowed',
        'purchase_note',
        'password',
        'virtual',
        'downloadable',
        'downloads',
        'download_limit',
        'download_expiry',
        'shipping_class_id',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * The categories that belong to the product.
     */
    public function categories() {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'category_id');
    }
    
}
