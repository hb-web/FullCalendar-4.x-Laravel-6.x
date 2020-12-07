<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Mail\SendMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function envoyer(Request $request)
    {
        // Mail::to('yonkayn123@gmail.com')->send(new ContactFormMail);
        $details = [
            'title' => 'Ecole X',
            'name'=> $request->name,
            'email'  => $request->email,
            'tel'  => $request->tel,
            'subject' => $request->subject,
            'body' => $request->message
        ];

        Mail::to('benbadr303@gmail.com')->send(new SendMail($details));
        return view('fullcalendar.views.Contact', [
            'errorMessageDuration' => 'Votre message a été envoyé avec succès'
       ]);
    }
}
