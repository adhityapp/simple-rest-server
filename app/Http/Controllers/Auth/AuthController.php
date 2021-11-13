<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('auth.v_login');
    }

    public function login(Request $request)
    {
        // $rules = [
        //     'email'                 => 'required|email',
        //     'password'              => 'required|string'
        // ];

        // $messages = [
        //     'email.required'        => 'Email wajib diisi',
        //     'email.email'           => 'Email tidak valid',
        //     'password.required'     => 'Password wajib diisi',
        //     'password.string'       => 'Password harus berupa string'
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
        // var_dump($data);

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');

        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('signin');
        }

    }

    public function showFormRegister()
    {
        return view('auth.v_register');
    }

    public function register(Request $request)
    {
        // $rules = [
        //     'name'                  => 'required|min:3|max:35',
        //     'email'                 => 'required|email|unique:users,email',
        //     'password'              => 'required|confirmed',
        //     'address'              => 'required|confirmed',
        //     'district'              => 'required|confirmed',
        // ];

        // $messages = [
        //     'name.required'         => 'Nama Lengkap wajib diisi',
        //     'name.min'              => 'Nama lengkap minimal 3 karakter',
        //     'name.max'              => 'Nama lengkap maksimal 35 karakter',
        //     'email.required'        => 'Email wajib diisi',
        //     'email.email'           => 'Email tidak valid',
        //     'email.unique'          => 'Email sudah terdaftar',
        //     'password.required'     => 'Password wajib diisi',
        //     'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
        //     'address.required'      => 'Alamat wajib diisi',
        //     'district.required'     => 'Kabupaten/Kota wajib diisi'
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->level = $request->level;
        $user->district = $request->district;
        $user->save();
        var_dump($user);
        if($user){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('signin');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('reg');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('signin');
    }


}
