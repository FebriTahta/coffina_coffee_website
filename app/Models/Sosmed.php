<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;
    protected $fillable = [
        'link','team_id','name'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
