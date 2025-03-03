<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;

use App\Models\SideBar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();
        $products = Product::all();
        $sidebar = SideBar::latest()->first();



        return view('home',compact("projects","products", 'sidebar'));
    }

    public function showProduct($id)
    {

        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function showProject($id)
    {
        $project = Project::where('id', $id)->first();

        return view('projects.show', compact('project'));
    }
}
