<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'img',
        'deskripsi',
        'position'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function sosmed()
    {
        return $this->hasMany(Sosmed::class);
    }
}
