<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return view('auth.register');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name_company' => ['required'],
            'roles' => ['required'],
            'status' => ['required'],
            'number_phone' => ['required'],
            'image_company' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'id_ktp' => ['required'],
            'address' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $file = $data['image_company'];

        // Proses file gambar
        $path = null;
        if ($file) {
            $path = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($path, file_get_contents($file));
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'roles' => $data['roles'],
            'status' => $data['status'],
            'name_company' => $data['name_company'],
            'password' => Hash::make($data['password']),
            'number_phone' => ($data['number_phone']),
            'image_company' => $path,
            'id_ktp' => ($data['id_ktp']),
            'address' => ($data['address']),
        ]);
    }
}
