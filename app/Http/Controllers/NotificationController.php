<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationCollection;
use App\Models\Notification;
use App\Http\Resources\Notification as NotificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'title' => 'string',
    ];
    public static $repulses = [
        'title' => 'string',
    ];

    public function index()
    {
//        return new NotificationCollection(Notification::paginate(10));
    }

    public function show(Notification $notification)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(self::$rules, self::$messages);
        $notification = new Notification($request->all());
        $notification->save();

        return response()->json(new NotificationResource($notification), 201);
    }

    public function delete(Request $request, Notification $notification)
    {
//        $this->authorize('delete', $notification);

        $notification->delete();
        return response()->json(null, 204);
    }

    public function indexReceiver()
    {
        //   $this->authorize('view', Appointment::class);
        $user = Auth::user();
        $notification = array('data' => NotificationResource::collection($user->notifications_receiver));
        $length = array('meta' => array('total' => (count($notification['data']))));
        $data = array_merge($notification, $length);
        return response()->json($data);
    }
}
