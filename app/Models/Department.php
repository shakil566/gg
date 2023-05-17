<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Department extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'department';
    public $timestamps = true;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->created_by = Auth::user()->id;
            $post->updated_by = Auth::user()->id;
        });

        static::updating(function ($post) {
            $post->updated_by = Auth::user()->id;
        });
    }
}
