<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Allergen;
class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allergen = Allergen::all();
        
        $data = $allergen;
        return view('admin.allergens.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.allergens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $data = $request->all();
        $new_dish = new Allergen();
        
        $new_dish->fill($data);
        $new_dish->save();

        return redirect()->route('admin.allergens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allergen = Allergen::find($id);
        $data = [$allergen];
        return view('admin.allergens.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allergen = Allergen::find($id);
        return view('admin.allergens.edit', compact('allergen'));
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
        $allergen = Allergen::findOrFail($id);
        $data = $request->all();
        $allergen->update($data);
        return redirect()->route('admin.allergens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allergen = Allergen::findOrFail($id);
        $allergen->delete();
        return redirect()->route('admin.allergens.index');
    }
}
