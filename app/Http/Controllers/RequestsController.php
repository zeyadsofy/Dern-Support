<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Service;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Requests::all();
        return view("super-admin.requests" , compact("requests"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $service = Service::findorfail($id);
        return view("user.request",compact("service"));
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
            ]);

            $requests = new Requests();
            $requests->name = $request->name;
            $requests->desc = $request->desc;
            $requests->category_id = $request->category_id;
            $requests->service_id = $request->service_id;
            $requests->user_id = $request->user_id;
            $requests->save();
            return redirect("/dashboard");
        }catch(Exeption $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Requests::findorfail($id)->delete();
                return redirect()->back();
            
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy1($id)
    {
        try{
            Requests::findorfail($id)->delete();
                return redirect()->route("request");
            
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}


