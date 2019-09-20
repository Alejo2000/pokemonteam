<?php

namespace Pokemon\Http\Controllers;
use Pokemon\Trainer;
use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use Pokemon\Http\Requests\StoreTrainerRequest;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
      //Subida de Imagenes
      if ($request->file('avatar'))
       {
        $file = $request->file('avatar');
        $name = 'avatar_trainer'. time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/';
        $file-> move($path, $name);

      }

        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->slug = Str_slug($request->input('name'));
        $trainer->save();
        return redirect()->route('trainers.index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //  $trainer = Trainer::where('slug','=', $slug)->firstOrFail();
          return view('trainers.show', compact('trainer'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,Trainer $trainer )
     {
       $trainer->fill($request->except('avatar'));
       if($request->hasFile('avatar')){
           $file = $request->file('avatar');
           $name = time().$file->getClientOriginalName();
           $destinationPath = public_path('/images');
           $trainer->avatar = $name;
           $file->move($destinationPath, $name);
       }
       $trainer->save();
       return redirect()->route('trainers.show',[$trainer])->with('status','El entrenador se actualizo correctamente');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
       return redirect()->route('trainers.index');
    }
}
