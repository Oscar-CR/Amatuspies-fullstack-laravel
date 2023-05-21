<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use App\Models\User;
use Illuminate\Http\Request;

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
}
