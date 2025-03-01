<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function createConsult(Request $request)
    {
        $request->validate(
            [
                "name" => "required|max:255",
                "email" => "required|email|max:255",
                "phone" => "required|max:13",
                "company" => "max:255",
                "service" => "required",
                "message" => "required"
            ],
            [
                "name.required" => "Name field must fill",
                "name.max" => "Name must not more 255 characters",
                "email.required" => "Email field must fill",
                "email.email" => "Email fieldmust fill with email template",
                "email.max" => "Email must not more 255 characters",
                "phone.required" => "Phone field must fill",
                "phone.max" => "Phone must not more than 13 numbers",
                "company.max" => "Company must not more 255 characters",
                "service.required" => "Service field must fill",
                "message.required" => "Message field must fill",
            ]
        );
        $companyName = null;
        if(!empty($request->company)){
            $companyName = $request->company;
        }
        Consultation::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "company"=>$companyName,
            "service"=>$request->service,
            "message"=>$request->message,
        ]);
        return redirect('/contact');
    }
    //
}
