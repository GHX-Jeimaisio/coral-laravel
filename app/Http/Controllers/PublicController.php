<?php

namespace App\Http\Controllers;

use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    public function homepage(){
        return view('public.homepage');
    }

    public function validateEmail(Request $request){
        $validator = Validator::make(['email' => $request->email], [
            'email' => 'required|email',
        ]);
        $status = $validator->fails();
        if ($status){
            $message = 'Email is not valid';
        } else {
            $message = 'Email validated';
        }
        $log = new Log();
        $log->email = $request->email;
        $log->status = $status;
        $log->save();

        return response()->json(['error'=>$status, 'message' => $message]);

    }
}
