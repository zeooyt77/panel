<?php

namespace Finexlyx\Models\Store;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model {
    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}