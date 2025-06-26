<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'user_id');
    }
}
