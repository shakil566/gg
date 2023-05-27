<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Support\Str;

class Menu extends Authenticatable {

    protected $table = 'menu';
    public $timestamps = true;

    public static function boot() {
        parent::boot();
        static::creating(function($post) {
            $post->created_by = Auth::user()->id;
            $post->updated_by = Auth::user()->id;
        });



        static::updating(function($post) {
            $post->updated_by = Auth::user()->id;
        });
    }

}
