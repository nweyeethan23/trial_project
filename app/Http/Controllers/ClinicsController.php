<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinics;
use App\Models\ClinicTimes;
use App\Models\DefaultHoliday;

class ClinicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $cliTimes = ClinicTimes::where('clinic_id',$request->id)->get()->groupBy('day_of_week');
            $sunday = $cliTimes['Sunday'] ?? null;
            $monday = $cliTimes['Monday'] ?? null;
            $tuesday = $cliTimes['Tuesday'] ?? null;
            $wednesday = $cliTimes['Wednesday'] ?? null;
            $thursday = $cliTimes['Thursday'] ?? null;
            $friday = $cliTimes['Friday'] ?? null;
            $saturday = $cliTimes['Saturday'] ?? null;
            $table = [
                'success'       => true,
                'table'         => view('clinics_hour.table',compact('sunday','monday','tuesday','wednesday','thursday','friday','saturday'))->render(),
            ];
            return response()->json($table);
        }
        $clinics = Clinics::get();
        return view('clinics_hour.index',compact('clinics'));
    }
    public function addHour(Request $request)
    {
        if($request->ajax()) {
            $child_count = $request->childCount;
            return view('clinics_hour.add_hour', compact('child_count'))->render();
        }
    }
    
    public function insertHour(Request $request)
    {
        if($request->ajax()) {
            $data = json_decode($request->data);
            $delete_list = json_decode($request->delete_item);
            ClinicTimes::destroy($delete_list);
            foreach($data as $list){
                
                if($list->holiday == 0){
                    
                   foreach($list->add_hour as $item){
                    
                        $cliTimes = ClinicTimes::find($item->id);

                        if($cliTimes){
                            $cliTimes->opening_hour = $item->start_time;
                            $cliTimes->closing_hour = $item->end_time;
                            $cliTimes->is_holiday = '0';
                            $cliTimes->update();
                        }else{
                            
                         ClinicTimes::create([
                                'clinic_id' => $item->clinic_id,
                                'day_of_week' =>  $list->day_of_week,
                                'opening_hour' => $item->start_time,
                                'closing_hour' => $item->end_time,
                                'is_holiday' => '0',
                            ]);
                        }
                      
                   }
                }else{
                   
                    //return $list->add_hour;
                    $arrayId = array_column($list->add_hour, 'id');
                    ClinicTimes::destroy($arrayId);
                    ClinicTimes::create([
                        'clinic_id' => $list->clinic_id,
                        'day_of_week' =>  $list->day_of_week,
                        'opening_hour' => '10:00:00',
                        'closing_hour' => '19:00:00',
                        'is_holiday' => 1,
                    ]);
                    DefaultHoliday::create([
                        'clinic_id' => $list->clinic_id,
                        'day_of_week' =>  $list->day_of_week,
                    ]);

                }
            }

            return response()->json([
                'data' => 'success'
            ]);
           
        }
    }
}
