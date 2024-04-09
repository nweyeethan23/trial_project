<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinics;

class LongHolidays extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'long_holidays';

    protected $fillable = [
        'clinic_id',
        'start_date',
        'end_date',
        'reason',
    ];


    public function clinics()
    {
        return $this->belongsTo(Clinics::class,'clinic_id');
    }

}
