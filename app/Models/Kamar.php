<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function perlengkapan()
    {
        return $this->belongsTo(Perlengkapan::class);
    }
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
