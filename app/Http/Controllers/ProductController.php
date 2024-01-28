<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index_product()
    {
        $user = auth()->user();
        $companies = $user ? $user->companies : null;

        $products = Product::all();

        return view('index-product', compact('companies', 'products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_product(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'speed' => 'required',
            'transmition' => 'required',
            'fuel' => 'required',
            'color' => 'required',
            'years_output' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',
            'company_id' => 'required|exists:companys,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size accordingly
        ]);


        $file = $request->file('image');

        if ($file) {
            $path = time() . '_' . $file->getClientOriginalName();

            Storage::disk('public')->put($path, file_get_contents($file));

            Product::create([
                'model' => $request->model,
                'merk' => $request->merk,
                'type' => $request->type,
                'speed' => $request->speed,
                'transmition' => $request->transmition,
                'fuel' => $request->fuel,
                'company_id' => $request->company_id,
                'color' => $request->color,
                'years_output' => $request->years_output,
                'description' => $request->description,
                'location' => $request->location,
                'price' => $request->price,
                'image' => $path,
            ]);
        }

        return Redirect::back()->with('success', 'Form submitted successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
