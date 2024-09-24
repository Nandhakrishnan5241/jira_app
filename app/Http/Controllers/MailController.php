<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Exception;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject' => "welcome",
            'body' => 'mail send success'
        ];



        try {
            Mail::to('nandhu5241@gmail.com')->send(new MailNotify($data));
            dd('send');
        }
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
