<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\SideBar;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::all()->count();
        $productCount = Product::all()->count();
        $userCount = User::all()->count();
        $sidebar = SideBar::latest()->first();

        return view('users.dashboard',compact("projectCount","productCount","userCount",'sidebar'));
    }
}
