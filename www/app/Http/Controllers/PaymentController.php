<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaymentReceived;
use App\Events\PaymentDone;

class PaymentController extends Controller
{
    public function create()
    {
    
        return view('payment.create');
    }

    public function store()
    {
        request()->validate([
            'amount' => 'required|min:1|numeric'
        ]);

        Notification::send( request()->user(), new PaymentReceived( request('amount') ) );
        //request()->user()->notify( new PaymentReceived );

        PaymentDone::dispatch('some-product');
        // event(new PaymentDone('some-product'));

        return redirect('notifications');
    }
}
