<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;

class DefaultHoliday extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'default_holidays';

    protected $fillable = [
        'clinic_id',
        'day_of_week'
    ];


    public function clinics()
    {
        return $this->belongsTo(Clinics::class,'clinic_id');
    }

}
