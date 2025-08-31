<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    public $table = 'donation';

    public function center()
    {
        return $this->belongsTo('App\Models\Center', 'center_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function giveaway()
    {
        return $this->belongsTo(Giveaway::class);
    }
}
