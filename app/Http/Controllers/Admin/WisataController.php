<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categori = Categori::all();
        $user = User::all();
        $data = DB::table('wisata')
                    ->join('categori', 'wisata.id_categori', '=', 'categori.id')
                    ->join('users', 'wisata.id_user', '=', 'users.id')
                    ->select('wisata.*', 'categori.nama AS cat', 'users.name AS us')
                    ->simplePaginate(5);
        return view('admin.wisata.index', ['data' => $data, 'categori' => $categori, 'user' => $user]);
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
        
        $image = $request->file('image');
        $filename = time()."_".$image->getClientOriginalName();
        $address = 'image_upload';
        $image->move($address, $filename);


        $item = [
            'nama' => $request->input('nama'),
            'lokasi' => $request->input('lokasi'),
            'foto' => $filename,
            'descripsi' => $request->input('descripsi'),
            'id_categori' => $request->input('id_categori'),
            'id_user' => $request->input('id_user'),
        ];

        
        Wisata::create($item);
        Session::flash('success', 'Wisata berhasil ditambah');
        return redirect('/admin/wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Wisata::findOrFail($id);
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
        $data = Wisata::findOrFail($id);

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
        $data = Wisata::findOrFail($id);

        $filename = $data->foto;
        if($request->hasFile('image')){
            $image_path = public_path().'/image_upload/'.$filename;
            if (file_exists($image_path))
                File::delete($image_path);
            $image = $request->file('image');
            $filename = time() . "_" . $image->getClientOriginalName();
            $address = 'image_upload';
            $image->move($address, $filename);
        }

        $data->nama = $request->nama;
        $data->lokasi = $request->lokasi;
        $data->foto = $filename;
        $data->descripsi = $request->descripsi;
        $data->id_categori = $request->id_categori;
        $data->id_user = $request->id_user;

        $data->update();

        Session::flash('success', 'Wisata berhasil diubah');
        return redirect()->route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::findOrFail($id);

        $data->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('wisata.index');
    }
}
