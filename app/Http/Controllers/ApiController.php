<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function storageForm(Request $request)
    {
        $newMedicalAppointment = new MedicalAppointment();
        $newMedicalAppointment->name = $request->name;
        $newMedicalAppointment->email = $request->email;
        $newMedicalAppointment->motive = $request->motive;
        $newMedicalAppointment->more_details = $request->more_details;
        $newMedicalAppointment->save();

        return redirect('https://amatuspies.com/contact-us/');;
    }
}
