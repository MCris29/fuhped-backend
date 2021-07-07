<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliate;

class AfiliateController extends Controller
{
    public function index()
    {
        return Afiliate::all();
    }

    public function show($id)
    {
        return Afiliate::find($id);
    }

    public function store(Request $request)
    {
        return Afiliate::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $afiliate = Afiliate::findOrFail($id);
        $afiliate->update($request->all());
        return $afiliate;
    }

    public function delete(Request $request, $id)
    {
        $afiliate = Afiliate::findOrFail($id);
        $afiliate->delete();
        return 204;
    }
}
