<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Http\Resources\Publication as PublicationResource;
use App\Http\Resources\PublicationCollection;
use JD\Cloudder\Facades\Cloudder;

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
        $image_name = $publication->image->getRealPath();

        Cloudder::upload($image_name, null, array(
            "folder" => "fuhped/blog",
            "overwrite" => FALSE,
            "resource_type" => "image",
            "responsive" => TRUE,
        ));

        $path = Cloudder::getResult();
        $publication->image = Cloudder::getPublicId();
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

        // Extrae publicId para eliminar la imagen de cloudinary
        $publicId = $publication->image;
        // $newPublicId = substr($publicId, 0, 32);

        Cloudder::destroyImage($publicId);
        Cloudder::delete($publicId);

        $publication->delete();
        return response()->json(null, 204);
    }
}
