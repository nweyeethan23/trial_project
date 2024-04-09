<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LongHolidays;
use App\Models\ClinicTimes;
use App\Models\DefaultHoliday;

class Clinics extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'clinics';
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    public function longHoliday()
    {
        
        return $this->hasMany(LongHolidays::class,'clinic_id');
    }

    public function clinicTime()
    {
        
        return $this->hasMany(ClinicTimes::class,'clinic_id');
    }
    public function defaultHoliday()
    {
        return $this->hasMany(DefaultHoliday::class,'clinic_id');
    }


}
