<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = $categories;
        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'cuisine'=>'required',  
        ]);
        $data = $request->all();
        $new_category = new Category();
        $new_category->fill($data);
        $new_category->save();
        // $new_category->dishes()->attach($data['dish']);

        return redirect()->route('admin.categories.index')->with('status', 'categoria aggiunta con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        $data = [$categories];
        return view('admin.categories.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        // $user = Auth::user();
        // $dishes = Dish::where('user_id', $user->id)->get();'dishes'
        return view('admin.categories.edit', compact('categories'));
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
        $request->validate([
            'cuisine'=>'required',  
        ]);
        $category = Category::findOrFail($id);
        $data = $request->all();
        $category->update($data);
        // if(array_key_exists('dish', $data)){
        //     $category->user()->sync($data['user']);
        // }else{
        //     $category->user()->sync([]);
        // }
        return redirect()->route('admin.categories.index')->with('status', 'categoria modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $order->dishes()->detach($order->id);
        $categories = Category::findOrFail($category->id);
        $categories->delete();
        return redirect()->route('admin.categories.index')->with('status', 'categoria eliminata con successo');
    }
}
