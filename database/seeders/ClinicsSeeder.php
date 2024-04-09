<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Clinics;

class ClinicsSeeder extends Seeder
{
    public function run(): void
    {

        $user = Clinics::create([
            'name' => '医院1',
            'address' => 'Tokyo',
            'phone' => '09957044798',
        ]);
        $user = Clinics::create([
            'name' => '医院2',
            'address' => 'Osaka',
            'phone' => '09957044798',
        ]);
    }
}
