<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate([ 'email' => 'required|email' ]);

        // Mail::raw('That\'s the message!', function($message){

        //     $message
        //         ->to( request('email') )
        //         ->subject('Hello!');
        // });
        
        Mail::to(request('email'))
            ->send(new ContactUs('Main Deal'));

        return redirect('/contact')
            ->with('message', 'Succesfully sent!');
    }
}
