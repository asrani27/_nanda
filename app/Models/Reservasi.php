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
}
