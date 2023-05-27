<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Support\Str;

class FooterMenu extends Authenticatable {

    protected $table = 'footer_menu';
    public $timestamps = true;

    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->created_by = Auth::user()->id;
            $post->updated_by = Auth::user()->id;
            $post->slug = Str::slug($post->title);
            //$post->save();
        });

        static::created(function($post) {
            $post->slug = Str::slug($post->title) . '-' . $post->id;
            $post->save();

        });
        static::updating(function($post) {
            $post->updated_by = Auth::user()->id;
            $post->slug = Str::slug($post->title) . '-' . $post->id;
        });
    }

}
