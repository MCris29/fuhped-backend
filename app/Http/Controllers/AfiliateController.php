<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliate;
use App\Http\Resources\Afiliate as AfiliateResource;
use App\Http\Resources\AfiliateCollection;

class AfiliateController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'address' => 'string',
        'state' => 'string',
    ];
    public static $repulses = [
        'address' => 'string',
        'state' => 'string',
    ];

    public function index()
    {
        return new AfiliateCollection(Afiliate::paginate(10));
    }

    public function show(Afiliate $afiliate)
    {
        return response()->json(new AfiliateResource($afiliate), 200);
    }

    public function store(Request $request)
    {
        $request->validate(self::$rules, self::$messages);
        $afiliate = new Afiliate($request->all());
        $afiliate->save();

        return response()->json(new AfiliateResource($afiliate), 201);
    }

    public function update(Request $request, Afiliate $afiliate)
    {
        $request->validate(self::$repulses, self::$messages);
        $afiliate->update($request->all());
        return response()->json($afiliate, 200);
    }

    public function delete(Afiliate $afiliate)
    {
        $afiliate->delete();
        return response()->json(null, 204);
    }
}
