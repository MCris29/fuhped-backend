<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\Service as ServiceResource;
use App\Http\Resources\ServiceCollection;

class ServiceController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'string',
        'price_fuhped' => 'string'
    ];
    public static $repulses = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'string',
        'price_fuhped' => 'string'
    ];

    public function index()
    {
        return new ServiceCollection(Service::paginate(10));
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
}
