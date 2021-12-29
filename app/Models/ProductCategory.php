<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model implements HasMedia
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
        'parent_id',
        'description',
    ];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the children for the category
     */
    public function children() {
        return $this->hasMany(ProductCategory::class, 'parent_id')->with('children');
    }

    /**
     * Get the parent that owns the children.
     */
    public function parent() {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    /**
     * The products that belong to the category.
     */
    public function products() {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id')->withTimestamps();
    }

    public static function checkboxTree($categories) {
        if(count($categories)) {
            echo '<ul>';
                foreach($categories as $category) {
                    echo '<li>';
                        echo '<div class="custom-control custom-checkbox">';
                            echo '<input type="checkbox" class="custom-control-input" id="category-'. $category->id .'" name="categories[]" value="'. $category->id .'">';
                            echo '<label class="custom-control-label" for="category-'. $category->id .'">'. $category->name .'</label>';
                        echo '</div>';
                        
                        if(count($category->children)) {
                            self::checkboxTree($category->children);
                        }
                    echo '</li>';
                }
            echo '</ul>';
        }
    }
}
