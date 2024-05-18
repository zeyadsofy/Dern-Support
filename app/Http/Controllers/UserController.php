<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Requests;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        $catigories = Category::all();
        $servecis = Service::all();
        $requests = Requests::where("user_id","=",Auth::user()->id)->get();
        return view('user.dashboard' , compact(["catigories","servecis","requests"]));
    }
}
