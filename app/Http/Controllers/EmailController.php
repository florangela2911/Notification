<?php

namespace App\Http\Controllers;

use App\Mail\EmailReceived;
use App\Models\usuarios_gs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class EmailController extends Controller
{
   public function EmailReceived()
   {
    $base = usuarios_gs::pluck('gmail');
   Mail::to($base)->send(new EmailReceived($base));
   }
} 

