<?php

namespace App\Http\Controllers\Admin;

use App\Allergen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Auth;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->id === 1){
            $dish = Dish::all();
            // $i = 0;
            $data = $dish;
        }else {
            $dish = Dish::where('user_id', $user->id)->get();
            $i = 0;
            $data = $dish;
        }
        
        return view('admin.dishes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergens = Allergen::all();
        $user = Auth::user();
        if($user->id === 1 ) {
            return redirect()->route('admin.dishes.index')->with('status', 'il super user, non può aggiungere piatti');
        }
        else {
        return view('admin.dishes.create', compact('allergens'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',  
            'price'=>'required|digits_between:1,4',
            'course'=>'required',
        ]);
        $user = Auth::user();
        $data = $request->all();
        $new_dish = new Dish();
        $new_dish->user_id = $user->id;
        $new_dish->fill($data);
        $new_dish->save();
        //letting user to choose no allergen
        if(isset($data['allergens'])){
            $new_dish->allergens()->attach( $data['allergens']);
        }
        return redirect()->route('admin.dishes.index')->with('status', 'piatto aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        $data = [$dish];
        return view('admin.dishes.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        $user = Auth::user();
        if($user->id === 1 ) {
            return redirect()->route('admin.dishes.index')->with('status', 'il super user, non può modificare i piatti dei ristoratori');
        }
        elseif ($dish['user_id']==$user['id']){
            
        
        $allergens = Allergen::all();
        return view('admin.dishes.edit', compact('dish','allergens'));};
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $data = $request->all();
        $dish->update($data);
        if(isset($data['allergens'])){
            $dish->allergens()->sync($data['allergens']);
        }
        return redirect()->route('admin.dishes.index')->with('status', 'piatto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->allergens()->detach($dish->id);
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('status', 'piatto correttamente eliminato');
    }
}
