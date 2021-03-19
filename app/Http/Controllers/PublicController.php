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

        /*Create or update CSV File*/
        $path = storage_path('app/public/');

        $fileName = 'logs.csv';

        $file = fopen($path.$fileName, 'a');

        $data = [
            now(),$request->email,$status > 0 ? 'false' : 'true'
        ];

        fputcsv($file, $data);

        fclose($file);

        return response()->json(['error'=>$status, 'message' => $message]);

    }
}
