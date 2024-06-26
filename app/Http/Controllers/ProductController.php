<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class ProductController extends Controller
{

    public function index_product()
    {
        $users = User::first();
        $user = auth()->user();
        $companies = $user ? $user->companies : null;
        $products = Product::with('user')
            ->orderByRaw("CASE WHEN status = 1 THEN 0 ELSE 1 END") // Urutan status 1 paling atas
            ->orderBy('id', 'desc') // Urutan id descending
            ->get();

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
    public function index_data()
    {


        $user_id = Auth::id();
        $company = Company::where('user_id', $user_id)->first();

        if ($company) {
            // Check if $company is not null
            $products = Product::where('company_id', $company->id)->get();
        } else {
            // If $company is null, set $products to an empty collection
            $products = collect();
        }

        return view('index-data', compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update_data(Product $product, Request $request)
    {
        $request->validate([
            'model' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'speed' => 'required',
            'plat' => 'required',
            'transmition' => 'required',
            'status' => 'required',
            'fuel' => 'required',
            'color' => 'required',
            'years_output' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);




        $product->update([
            'model' => $request->model,
            'merk' => $request->merk,
            'type' => $request->type,
            'plat' => $request->plat,
            'status' => $request->status,
            'speed' => $request->speed,
            'transmition' => $request->transmition,
            'fuel' => $request->fuel,
            'color' => $request->color,
            'years_output' => $request->years_output,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully');
    }



    public function store_product(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'speed' => 'required',
            'transmition' => 'required',
            'fuel' => 'required',
            'plat' => 'required',
            'status' => 'required',
            'color' => 'required',
            'years_output' => 'required',
            'description' => 'required',
            'price' => 'required',
            'company_id' => 'required|exists:companys,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size accordingly
        ]);


        $file = $request->file('image');

        if ($file) {
            $path = time() . '_' . $file->getClientOriginalName();

            Storage::disk('public')->put($path, file_get_contents($file));

            $user = Auth::user()->id;

            Product::create([
                'model' => $request->model,
                'merk' => $request->merk,
                'user_id' => $user,
                'type' => $request->type,
                'plat' => $request->plat,
                'speed' => $request->speed,
                'status' => $request->status,
                'transmition' => $request->transmition,
                'fuel' => $request->fuel,
                'company_id' => $request->company_id,
                'color' => $request->color,
                'years_output' => $request->years_output,
                'description' => $request->description,
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
    public function show_product(Product $product)
    {
        return view('show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::back()->with('success', 'Deleted successfully');
    }
}
