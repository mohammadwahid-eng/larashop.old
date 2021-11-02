<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    
    protected $fillable = [
        'name',
        'description',
        'rating',
        'admin_id',
    ];

    /**
     * Get the admin that owns the shop.
     */
    public function owner()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * The customers that belong to the shop.
     */
    public function customers() {
        return $this->belongsToMany(User::class);
    }
}
