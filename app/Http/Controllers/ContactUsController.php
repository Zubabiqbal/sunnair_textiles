<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contact(ContactUsRequest $request)
    {
        Mail::to('it.engr.haider@gmail.com')
            ->send(new ContactUs('hello@gmail.com', 'my message'));
    }
}
