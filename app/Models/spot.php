<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;
    /**
     * Get the availabe_vacine associated with the Spot
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function availabe_vacine()
    {
        return $this->hasOne(Available_vacine::class, 'spot_id', 'id');
    }
}
