<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
