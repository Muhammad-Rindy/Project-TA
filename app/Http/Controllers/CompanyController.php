<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_company()
    {
        $companies = auth()->user()->companies;

        // return response()->json($companies);

        return view('index-company', compact('companies'));
    }
    public function index_member()
    {
        $members = User::all();


        return view('index-member', compact('members'));
    }

    public function update_member(User $member, Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);




        $member->update([
                'status' => $request->status,
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_about()
    {
        return view('index-about');
    }

    public function delete_member(User $member)
    {
        $member->delete();
        return Redirect::back()->with('success', 'Deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_company(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'description' => 'required',
            'number_phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size accordingly
        ]);


        $file = $request->file('image');

        if ($file) {
            $path = time() . '_' . $file->getClientOriginalName();
            $user = Auth::user()->id;

            Storage::disk('public')->put($path, file_get_contents($file));

            Company::create([
                'name' => $request->name,
                'user_id' => $user,
                'email' => $request->email,
                'number_phone' => $request->number_phone,
                'address' => $request->address,
                'description' => $request->description,
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