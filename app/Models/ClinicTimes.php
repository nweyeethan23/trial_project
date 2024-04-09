<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;

class ClinicTimes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'clinic_times';

    protected $fillable = [
        'clinic_id',
        'day_of_week',
        'opening_hour',
        'closing_hour',
        'is_holiday',
    ];


    public function clinics()
    {
        return $this->belongsTo(Clinics::class,'clinic_id');
    }

}
