<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TranslateController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'word' => 'required',
            'source_language' => 'required',
            'target_language' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
        }elseif($data = Word::translate($request->all())){
            $status = 200;
        }else{
            $errors = 'Not found';
        }
        return response(['data' => isset($data)?$data:'', 'error' => isset($errors)?$errors:''], isset($status)?$status:404);
    }

}
