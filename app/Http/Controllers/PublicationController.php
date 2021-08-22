<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Http\Resources\Publication as PublicationResource;
use App\Http\Resources\PublicationCollection;

class PublicationController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public static $rules = [
        'title' => 'required|string',
        'description' => 'required|string',
    ];
    public static $repulses = [
        'title' => 'string',
        'description' => 'string',
        'image' => 'image|dimensions:min_width=200,min_height=200',
    ];

    public function index()
    {
        return new PublicationCollection(Publication::paginate(100));
    }

    public function show(Publication $publication)
    {
        return response()->json(new PublicationResource($publication), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Publication::class);

        $request->validate(self::$rules, self::$messages);
        $publication = new Publication($request->all());
        $path = $request->image->store('public/publications');
        $publication->image = $path;
        $publication->save();

        return response()->json(new PublicationResource($publication), 201);
    }

    public function update(Request $request, Publication $publication)
    {
        $this->authorize('update', $publication);

        $request->validate(self::$repulses, self::$messages);
        $publication->update($request->all());
        return response()->json($publication, 200);
    }

    public function delete(Publication $publication)
    {
        $this->authorize('delete', $publication);

        $publication->delete();
        return response()->json(null, 204);
    }
}
