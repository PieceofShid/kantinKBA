<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = ['santri_id', 'nominal'];

    public function santri(){
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
