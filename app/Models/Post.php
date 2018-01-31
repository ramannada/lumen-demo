<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    public static $rules = [
        // Validation rules
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comment() {
        return $this->hasMany('App\Model\Comment');
    }
}
