<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = product::with('category')->get();

        return view('product/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = category::all();

        return view('product/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'category_id' => 'required'
        ]);
        //==========

        product::create([
            'name' => $validated['product_name'],
            'description' => $validated['product_description'],
            'price' => $validated['product_price'],
            'category_id' => $validated['category_id']
        ]);

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = category::all();
        $data['product'] = product::find($id);

        return view('/product/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        product::where('id', $id)->update([
            'name' => $validated['product_name'],
            'description' => $validated['product_description'],
            'category_id' => $validated['category_id'],
            'price' => $validated['product_price']
        ]);

            return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('/product');
    }
}
