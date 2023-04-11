<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Image $image)
    {

        $busqueda = Word::where('name', 'like', $request->name)->where('image_id', 'like', $image->id)->get();
        if(count($busqueda) > 0){
            return to_route('images.show',$image)->with('badstatus','ya hay una palabra con ese nombre');
        }
        $validatedData = $request->validate([
            'name' => ['required','min:3'],

        ]);

            $word=Word::create([
            'name'=>$validatedData['name'],
            'image_id'=>$image->id,
            ]);
            return to_route('images.show',$image)->with('status','palabra agregada');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        $image=Image::where('id','like',$word->image_id)->get()->first();
        $busqueda = Word::where('name', 'like', $request->name)->where('image_id', 'like', $word->image_id)->get();
        if(count($busqueda) > 0){
            return to_route('images.show',$image)->with('badstatus','ya hay una palabra con ese nombre');
        }
        $validatedData = $request->validate([
            'name' => ['required','min:3'],
        ]);

        $word->name=$request->input('name');
        $word->save();

        return to_route('images.show',$image)->with('status','palabra actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
       $image=Image::where('id','like',$word->image_id)->get()->first();

       $word->delete();
       return to_route('images.show',$image)->with('status','palabra actualizada');
    }
}
