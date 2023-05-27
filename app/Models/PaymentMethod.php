<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class PaymentMethod extends Model {

    protected $primaryKey = 'id';
    protected $table = 'payment_method';
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
