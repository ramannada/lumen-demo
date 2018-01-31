<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = "comments";

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];


    public static $rules = [
        // Validation rules
    ];

    // Relationships

    public function post() {
        return $this->belongsTo('App\Model\Post');
    }

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

}
