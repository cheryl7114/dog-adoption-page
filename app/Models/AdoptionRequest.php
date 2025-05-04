<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
   protected $fillable = [
        'user_id',
        'dog_id',
        'contact_email',
        'contact_phone',
        'message',
        'status',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
