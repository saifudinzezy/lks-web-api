<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available_vacine extends Model
{
    use HasFactory;

    /**
     * Get the spot that owns the Available_vacine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spot()
    {
        return $this->belongsTo(Spot::class, 'spot_id', 'id');
    }
}
