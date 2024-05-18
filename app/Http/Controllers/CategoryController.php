<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catigories = Category::all();
        return view("super-admin.categry" , compact("catigories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catigories = Category::all();
        return view("super-admin.Addcategry" , compact("catigories"));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
              'name' => 'required', 
              'desc'=>'required'     
          ]);
            $category = new Category();
            $category->name = $request->name;
            $category->desc = $request->desc;
            $category->save();
            return redirect()->route('category');
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      
    }


    public function show($id)
    {
        $category = Category::findorfail($id);
        return view("super-admin.editCategory" , compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',      
            ]);
            $Edit = Category::findorfail($request->id);
            $Edit->name = $request->name;
            $Edit->desc = $request->desc;
            $Edit->save();
            return redirect()->route('category');
        }
      
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Category::findorfail($id)->delete();
            return redirect()->route('category');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
