<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'society_id',
        'disease_history',
        'current_symptoms',
    ];

    /**
     * Get the user associated with the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    /**
     * Get the society associated with the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function society()
    {
        return $this->belongsTo(Society::class, 'society_id', 'id');
    }
}
