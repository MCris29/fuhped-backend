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
        //$this->authorize('ViewAny',Book::class);
        return new PublicationCollection(Publication::paginate(10));
    }

    public function show(Publication $publication)
    {
        return response()->json(new PublicationResource($publication), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //$this->authorize('create',$publication);

        $request->validate(self::$rules, self::$messages);
        $publication = new Publication($request->all());
        $pathImage = $request->image->store('public/books/cover_pages');
        $publication->image = $pathImage;
        $publication->save();

        return response()->json(new PublicationResource($publication), 201);
    }

    public function update(Request $request, Publication $publication)
    {
//        $this->authorize('update', $publication);

        $request->validate(self::$repulses, self::$messages);
        $publication->update($request->all());
        return response()->json($publication, 200);
    }

    public function delete(Publication $publication)
    {
//        $this->authorize('delete', $publication);

        $publication->delete();
        return response()->json(null, 204);
    }
}
