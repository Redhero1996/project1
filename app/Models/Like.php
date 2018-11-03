<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'topic_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }
}
