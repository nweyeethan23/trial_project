<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LongHolidays;
use App\Models\Clinics;

class LongVocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $LongHolidays = LongHolidays::where('clinic_id',$request->id)->orderBy('start_date', 'ASC')->get();
            $table = [
                'success'       => true,
                'table'         => view('long_vocation.table',compact('LongHolidays'))->render(),
            ];
            return response()->json($table);

        }
        $clinics = Clinics::get();
        return view('long_vocation.index',compact('clinics'));
    }
    public function addVocation(Request $request)
    {

        if ($request->ajax()) {
            $longHoliday = LongHolidays::create([
                'clinic_id' => $request->id,
                'start_date' => $request->startDate,
                'end_date' => $request->endDate,
                'reason' => $request->reason,
            ]);
            return response()->json([
                'data' => 'success'
            ]);

        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $LongHolidays = LongHolidays::find($request->id);
            $LongHolidays->delete();
            return response()->json([
                'data' => 'success'
            ]);
        }
    }
}
