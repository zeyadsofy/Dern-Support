<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services= Service::all();
        return view("super-admin.service" , compact("services"));
    }
    public function user()
    {
        $services= Service::all();
        $catigories = Category::all();

        return view("user.service" , compact(["services","catigories"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catigories = Category::all();
        return view("super-admin.addService" , compact("catigories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                "desc"=>"required",
                "category_id"=>"required"      
            ]);

            $service = new Service();
            $service->name = $request->name;
            $service->desc = $request->desc;
            $service->category_id = $request->category_id;
            $service->save();
            return redirect()->route("service");
        }catch(Exeption $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::findorfail($id);
        $catigories = Category::all();
        return view("super-admin.editService" , compact(["service" , "catigories"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                "desc"=>"required",
                "category_id"=>"required"      
            ]);

            $service = Service::findorfail($request->id);
            $service->name = $request->name;
            $service->desc = $request->desc;
            $service->category_id = $request->category_id;
            $service->save();
            return redirect()->route("service");
        }catch(Exeption $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Service::findorfail($id)->delete();
            return redirect()->route('service');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }
}
