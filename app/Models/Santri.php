<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'pin', 'saldo'];

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'santri_id');
    }
}
