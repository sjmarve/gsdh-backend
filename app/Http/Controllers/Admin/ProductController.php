<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'picture' => 'required',
        ]);

        $validData['img_path'] = $request->file('picture')?$request->file('picture')->store('public/images'):null;

        unset($validData['picture']);

        $product = Product::create($validData);

        return redirect()->route('products.index')->with('status', 'Product #'.$product->id. ' created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $updateData = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);
        if ($request->file('picture')) {
            //clean up old
            if ($product->img_path && Storage::exists($product->img_path)) {
                Storage::delete($product->img_path);
            }
            $updateData['img_path'] = $request->file('picture')->store('public/images');
        }

        $product->update($updateData);

        return redirect()->route('products.index')->with('status', 'Product #'.$product->id. ' updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->id;
        //clean up
        if ($product->img_path && Storage::exists($product->img_path)) {
            Storage::delete($product->img_path);
        }
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product #'.$id. ' deleted.');
    }
}
