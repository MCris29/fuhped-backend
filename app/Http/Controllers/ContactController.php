<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'name' => 'string',
        'email' => 'string',
        'comment' => 'string',
    ];

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'comment' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $info = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'comment' => $request->get('comment'),
        ];

        Mail::to(env('MAIL_CONTACT'))->send(new Contact($info));

        return response()->json(compact('info'), 201);
    }
}
