<?php

namespace App\Http\Controllers;

use App\Models\SideBar;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sidebar = SideBar::latest()->first();
        return view('products.index', compact('products','sidebar'));
    }

    public function create()
    {
        $sidebar = SideBar::latest()->first();
        return view('products.create',compact('sidebar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|image',
            'description' => 'required',
        ]);

        $photoPath = $request->file('photo')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $product->photo);
            $photoPath = $request->file('photo')->store('products', 'public');
            $product->update(['photo' => $photoPath]);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->photo);
        $product->delete();
        return redirect()->route('products.index');
    }
}
