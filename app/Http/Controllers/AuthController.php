<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if (auth()->user()->role == 'admin') {
                # code...
                Session::flash('success', 'Selamat anda berhasil login');
                return redirect()->route('AdminIndex');
            } else {
                Session::flash('success', 'Selamat anda berhasil login');
                return redirect()->route('MemberIndex');
            }
        }
        return view('auth.index');
    }

    public function register()
    {
        $data = Categori::all();
        return view('auth.register', ['categori' => $data]);
    }

    public function aksiRegister(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            $pw = Hash::make($request->input('password')),
            'password' => $pw,
            'id_categori' => $request->input('id_categori'),
            'role' => 'member',
        ];

        $daftar = User::create($data);
        // dd($data);
        if ($daftar) {
            # code...
            Session::flash('success', 'Anda berhasil mendaftar silahkan login');
            return redirect()->route('login');
        } else {
            Session::flash('error', 'Anda gagal mendaftar silahkan coba lagi!');
        }
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) {
            # code...
            // Session::flash('success', 'Selamat anda berhasil login');
            // return redirect()->route('AdminIndex');
            if (auth()->user()->role == 'admin') {
                # code...
                Session::flash('success', 'Selamat anda berhasil login');
                return redirect()->route('AdminIndex');
            } else {
                Session::flash('success', 'Selamat anda berhasil login');
                return redirect()->route('MemberDashboard');
            }
        } else {
            Session::flash('error', 'Email/password salah');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success', 'Anda telah Logout');
        return redirect()->route('login');
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
    public function store(Request $request)
    {
        //
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
