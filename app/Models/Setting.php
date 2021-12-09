<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
    ];

    public static function get($key) {
        $entry = Setting::where('key', $key)->first();
        return $entry ? $entry->value : false;
    }

    public static function set($key, $value) {
        $entry = Setting::firstOrCreate([
            'key' => $key,
        ]);
        $entry->value = $value;
        return $entry->save();
    }
}
