<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\Service as ServiceResource;
use App\Http\Resources\ServiceCollection;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'required',
        'price_fuhped' => 'required',
    ];

    public static $repulses = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'required',
        'price_fuhped' => 'required',
    ];

    public function index(User $user)
    {
        return new ServiceCollection($user->services);
    }

    public function show(Service $service)
    {
        return response()->json(new ServiceResource($service), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Publication::class);

        $request->validate(self::$rules, self::$messages);
        $service = new Service($request->all());
        $service->save();

        return response()->json(new ServiceResource($service), 201);
    }

    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $request->validate(self::$repulses, self::$messages);
        $service->update($request->all());
        return response()->json($service, 200);
    }

    public function delete(Request $request, Service $service)
    {
        $this->authorize('delete', $service);

        $service->delete();
        return response()->json(null, 204);
    }

    public function indexUser()
    {
        $user = Auth::user();
        $services = array('data' => ServiceResource::collection($user->services));
        $length = array('meta' => array('total' => (count($services) + 1)));
        $data = array_merge($services, $length);
        return response()->json($data);
    }
}
