<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categori = Categori::all();
        $data = User::join('categori', 'categori.id', '=', 'users.id_categori')->simplePaginate(10, ['users.*', 'categori.nama']);
        
        // $data = DB::table('users')
        // ->join('categori', 'users.id_categori', '=', 'categori.id')
        // ->select('users.*', 'categori.nama')->get();
        // dd($data);
        return view('admin.user.index', ['data' => $data, 'categori' => $categori]);
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
        $item = [
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            $pw = $request->input('password'),
            'password' => Hash::make($pw),
            'id_categori' => $request->input('id_wisata'),
        ];
        // dd($item);
        User::create($item);
        Session::flash('success', 'User berhasil ditambah');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return $data;
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
        $data = User::findOrFail($id);
        $item = [
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            $pw = $request->input('password'),
            'password' => Hash::make($pw),
            'id_categori' => $request->input('id_wisata'),
        ];
        $data->update($item);

        Session::flash('success', 'User berhasil diubah');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->delete();

        Session::flash('success', 'User berhasil dihapus');
        return redirect()->route('user.index');
    }
}
