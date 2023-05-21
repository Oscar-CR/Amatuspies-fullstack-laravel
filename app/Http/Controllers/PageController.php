<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function index()
    {
        $users = User::all()->count();

        $medical_appointment = MedicalAppointment::all()->count();

        $dates = 0;

        $sales = 0;

        $home_page = 'home_page';

        return view("pages.dashboard", compact('users', 'medical_appointment', 'dates', 'sales' ,'home_page'));

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
}
