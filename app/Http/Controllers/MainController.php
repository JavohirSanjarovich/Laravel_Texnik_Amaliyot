<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function dashboard()
    {
        $applications=Application::paginate(4);
        return view('dashboard',compact('applications'));

    }

    public function main()
    {
        $applications=Application::all();
        return redirect('dashboard');
    }
}
