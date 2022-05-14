<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;
    protected $fillable = [
        'regional_id',
        'id_card_number',
        'name',
        'gender',
        'address',
        'token',
        'password',
    ];
}
