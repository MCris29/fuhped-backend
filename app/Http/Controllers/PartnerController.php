<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        return Partner::all();
    }

    public function show($id)
    {
        return Partner::find($id);
    }

    public function store(Request $request)
    {
        return Partner::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->update($request->all());
        return $partner;
    }

    public function delete(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return 204;
    }
}
