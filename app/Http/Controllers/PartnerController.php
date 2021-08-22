<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Resources\Partner as PartnerResource;
use App\Http\Resources\PartnerCollection;

class PartnerController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'business' => 'string',
        'description' => 'string',
        'address' => 'string',
        'state' => 'string',
    ];
    public static $repulses = [
        'business' => 'string',
        'description' => 'string',
        'address' => 'string',
        'state' => 'string',
    ];

    public function index()
    {
        return new PartnerCollection(Partner::paginate(100));
    }

    public function show(Partner $partner)
    {
        return response()->json(new PartnerResource($partner), 200);
    }

    public function store(Request $request)
    {
        $request->validate(self::$rules, self::$messages);
        $partner = new Partner($request->all());
        $partner->save();

        return response()->json(new PartnerResource($partner), 201);
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate(self::$repulses, self::$messages);
        $partner->update($request->all());
        return response()->json($partner, 200);
    }

    public function delete(Partner $partner)
    {
        $partner->delete();
        return response()->json(null, 204);
    }
}
