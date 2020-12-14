<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

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
        $sections = Section::all();
        return view('product.product',compact('products','sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
            'created_by' => Auth::user()->name,
        ]);
        return redirect()->route('products.index')->with(['success' => "تم حفظ المنتج بنجاح"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
   
        $id = Section::where('section_name', $request->section_name)->first()->id;

        $products = Product::findOrFail($request->pro_id);
 
        $products->update([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'section_id' => $id,
        ]);

        return redirect()->route('products.index')->with(['success' => "تم تحديث المنتج بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        $Product = Product::findOrFail($request->pro_id);
        $Product->delete();
        return redirect()->route('products.index')->with(['success' => "تم حذف المنتج بنجاح"]);

    }
}
