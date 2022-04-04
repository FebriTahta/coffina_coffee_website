<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choice_message extends Model
{
    use HasFactory;
    protected $fillable=[
        'choice_id','message_id'
    ];
}
