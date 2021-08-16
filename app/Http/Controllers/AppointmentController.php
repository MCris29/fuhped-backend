<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Resources\AppointmentCollection;
use Illuminate\Support\Facades\Auth;

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
        $this->authorize('viewAny', Appointment::class);

        $appointment = array('data' => new AppointmentCollection(Appointment::all()));
        $length = array('meta' => array('total' => (count($appointment['data']))));
        $data = array_merge($appointment, $length);
        return response()->json($data);
    }

    public function show(Appointment $appointment)
    {
        $this->authorize('view', $appointment);

        return response()->json(new AppointmentResource($appointment), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Appointment::class);

        $request->validate(self::$rules, self::$messages);
        $appointment = new Appointment($request->all());
        $appointment->save();

        return response()->json(new AppointmentResource($appointment), 201);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        $request->validate(self::$repulses, self::$messages);
        $appointment->update($request->all());
        return response()->json($appointment, 200);
    }

    public function delete(Request $request, Appointment $appointment)
    {
        $this->authorize('delete', $appointment);

        $appointment->delete();
        return response()->json(null, 204);
    }

    public function indexPartner()
    {
        $this->authorize('view', Appointment::class);
        $user = Auth::user();
        return new AppointmentCollection($user->appointments_partner);
    }

    public function indexAfiliate()
    {
        $this->authorize('view', Appointment::class);
        $user = Auth::user();
        return new AppointmentCollection($user->appointments_afiliate);
    }
}
