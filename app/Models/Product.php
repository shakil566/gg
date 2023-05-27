<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Support\Str;

class Product extends Model {

    protected $primaryKey = 'id';
    protected $table = 'product';
    public $timestamps = true;

    public static function boot() {
        parent::boot();
        static::creating(function ($post) {
            $post->created_by = Auth::user()->id;
            $post->updated_by = Auth::user()->id;
            $post->slug = Str::slug($post->name);
        });

        static::created(function ($post) {
            $post->slug = Str::slug($post->name) . '-' . $post->id;
            $post->save();
        });

        static::updating(function ($post) {
            $post->updated_by = Auth::user()->id;
            $post->slug = Str::slug($post->name) . '-' . $post->id;
        });
    }

}
