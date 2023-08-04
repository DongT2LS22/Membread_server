<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;


class EmailController extends Controller
{
    public function sendEmail()
    {
        SendEmailJob::dispatch()->delay(5);

        return view('welcome');
    }
}
