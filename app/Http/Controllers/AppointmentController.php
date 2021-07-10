<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class AppointmentController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'title' => 'string',
        'description' => 'string',
        'date' => 'date',
        'state' => 'string',
    ];
    public static $repulses = [
        'title' => 'string',
        'description' => 'string',
        'date' => 'date',
        'state' => 'string',
    ];

    public function index()
    {
        return new AppointmentCollection(Appointment::paginate(10));
    }

    public function show(Appointment $appointment)
    {
        return response()->json(new AppointmentResource($appointment), 200);
    }

    public function store(Request $request)
    {
        $request->validate(self::$rules, self::$messages);
        $appointment = new Appointment($request->all());
        $appointment->save();

        return response()->json(new AppointmentResource($appointment), 201);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate(self::$repulses, self::$messages);
        $appointment->update($request->all());
        return response()->json($appointment, 200);
    }

    public function delete(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(null, 204);
    }
}
