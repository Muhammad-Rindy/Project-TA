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
        $user = Auth::user();

        $companies = auth()->user()->companies;

        return view('index-company', compact('user', 'companies'));
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
            'description' => 'required',
        ]);

        $user = Auth::user()->id;
        Company::create([
            'user_id' => $user,
            'description' => $request->description,
        ]);

        return Redirect::back()->with('success', 'Form submitted successfully');
    }
}
