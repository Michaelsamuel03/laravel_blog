<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id', // if you are saving the logged-in user with the post



    ];



    public function user()
{
    return $this->belongsTo(User::class);
}

}
