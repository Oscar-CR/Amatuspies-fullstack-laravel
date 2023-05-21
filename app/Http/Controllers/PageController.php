<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use App\Models\MedicalDate;
use App\Models\User;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageController extends Controller
{

    public function index()
    {

        $today =Carbon::now();
        $format_day = date('Y-m-d');

        $users = User::all()->count();
        $medical_appointment = MedicalAppointment::all()->count();
        $dates = MedicalDate::all()->count();
        $today_dates = MedicalDate::whereDate('date',$format_day)->get()->count();
        $dates_data = MedicalDate::all();
        $today_dates_data = MedicalDate::whereDate('date',$format_day)->get();

        $home_page = 'home_page';

        return view("pages.dashboard", compact('users', 'medical_appointment', 'dates', 'today_dates' ,'home_page', 'dates_data', 'today_dates_data'));

    }

    public function vr()
    {
        return view("pages.virtual-reality");
    }

    public function rtl()
    {
        return view("pages.rtl");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }

    public function userManagement()
    {
        $users = User::all();
        $user_page = true;
        return view("pages.user-management", compact('users','user_page'));
    }

    public function medicalAppointment()
    {
        $medical_appointments = MedicalAppointment::orderBy('created_at', 'DESC')->simplePaginate(10);
        $medical_appointment_page = true;
        return view("pages.medical-appointment", compact('medical_appointments', 'medical_appointment_page'));
    }

    public function deleteMedicalAppointment(Request $request)
    {
        DB::table('medical_appointment')->where('id',$request->id)->delete();
        return redirect()->action([PageController::class, 'medicalAppointment'])->with('message', 'Registro eliminado correctamente ');

    }

    public function date()
    {  
        $medical_dates = MedicalDate::simplePaginate(10);

        $medical_page = 'medical_page';
        return view("pages.medical-date", compact('medical_dates', 'medical_page'));
    }


    public function createDate(Request $request)
    {
 
        $create_medical_date = new MedicalDate();
        $create_medical_date->client_name = $request->client_name;
        $create_medical_date->motive_date = $request->motive_date;
        $create_medical_date->treatment_type = $request->treatment_type;
        $create_medical_date->more_details = $request->more_details;
        $create_medical_date->date = $request->date;
        $create_medical_date->save();
        return redirect()->back()->with('message', 'Cita guardada correctamente');

    }

    public function editDate()
    {
        # code...
    }

    public function updateDate(Request $request)
    {
        DB::table('medical_date')->where('id',$request->id)->update([
            'client_name' => $request->client_name,
            'motive_date' => $request->motive_date,
            'treatment_type' => $request->treatment_type,
            'more_details' =>$request->more_details,
            'date' =>$request->date
        ]);
        return redirect()->back()->with('message', 'Cita actualizada correctamente');
    }

    public function deleteDate(Request $request)
    {
        DB::table('medical_date')->where('id',$request->id)->delete();
        return redirect()->back()->with('message', 'Cita eliminada correctamente');
    }
}
