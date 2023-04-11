<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Word;
use App\Http\Requests\SaveImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImgController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    public function index()
    {
        $images=Image::get();
        return view('images.index',['posteo'=>$images]);

    }

    public function create()
    {

        return view('images.create',['postEdit'=>new Image]);
    }

    public function store(SaveImageRequest $request)
    {
        $busqueda = Image::where('name', 'like', $request->name)->get();
        if(count($busqueda) > 0){
            return to_route('images.index')->with('badstatus','ya hay un registro con ese nombre');
        }
            $image = new Image();
            $image->name = $request->input('name');

            if ($request->hasFile('imagen_id')) {
                $img = $request->file('imagen_id');
                $imagePath = $img->storePublicly('images', 'public');
                $image->imagen_id = $imagePath;
            }

            $image->save();
            $images=Image::get();


         return to_route('images.index')->with('status','post creado');

    }

    public function show(Image $image)
    {

        return view('images.show',['post'=>$image]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {

        return view('images.edit',['postEdit'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveImageRequest $request,Image $image)
    {

        $image->name = $request->input('name');
        $imageToDelete = $image->imagen_id;
        if ($request->hasFile('imagen_id')) {
            $img = $request->file('imagen_id');
            $imagePath = $img->storePublicly('images', 'public');
            $image->imagen_id = $imagePath;
        }
        $image->save();

        if ($imageToDelete !== $image->imagen_id) {
            Storage::delete("public/".$imageToDelete);
        }

        return to_route('images.index',$image)->with('status','post actualizado');
    }

    public function destroy(Image $image)
    {
        $imageToDelete = $image->imagen_id;
        Storage::delete("public/".$imageToDelete);
        $image->words()->where('image_id', $image->id)->delete();
        $image->delete();

        return to_route('images.index',$image)->with('status','post eliminado');
    }
}
