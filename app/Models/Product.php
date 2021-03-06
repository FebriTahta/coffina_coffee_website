<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'jenis_id',
        'name',
        'deskripsi',
        'img'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
