<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeValue;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'frontend_type',
        'is_filterable',
        'is_required',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts  = [
        'is_filterable' => 'boolean',
        'is_required'   => 'boolean',
    ];

    /**
     * Get the values for the attribute.
     */
    public function values() {
        return $this->hasMany(AttributeValue::class);
    }
}
