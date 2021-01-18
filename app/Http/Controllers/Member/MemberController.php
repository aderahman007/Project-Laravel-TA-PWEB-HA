<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
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
            ->where('id_user', '=', Auth::user()->id)
            ->simplePaginate(5);
        return view('member.index', ['data' => $data, 'user' => $user, 'categori' => $categori]);
    }

    public function dashboard(){
        $carousel = [
            ['title' => 'Pantai Gigi Hiu', 'descripsi' => 'Gugusan batu karang yg ada di pantai Pegadung kecamatan Kelumbayan Kabupaten Tanggamus, Lampung', 'gambar' => '1.jpg'],
            ['title' => 'Menara Siger', 'descripsi' => 'Menara siger adalah simbol bangunan masa depan representasi fenomena masyarakat lampung', 'gambar' => '2.jpg'],
            ['title' => 'Pantai Labuan Jukung', 'descripsi' => 'Pantai labuan jukung mempunyai pemandangan alam yg indah, ombak yg lumayan mengasyikkan untuk beberapa peselancar, nyaman untuk tiap-tiap kegiatan pantai', 'gambar' => '3.jpg'],
            ['title' => 'Pulau Pahawang', 'descripsi' => 'Pulau Pahawang merupakan salah satu tempat wisata di Lampung yang menjadi surga bagi para pecinta diving, snorkeling atau sekedar menikmati pemandangan saja', 'gambar' => '4.jpg'],
        ];

        return view('member.dashboard', ['carousel' => $carousel]);
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
        $filename = time() . "_" . $image->getClientOriginalName();
        $address = 'image_upload';
        $image->move($address, $filename);


        $item = [
            'nama' => $request->input('nama'),
            'lokasi' => $request->input('lokasi'),
            'foto' => $filename,
            'descripsi' => $request->input('descripsi'),
            'id_categori' => Auth::user()->id_categori,
            'id_user' => Auth::user()->id,
        ];

       
        Wisata::create($item);
        Session::flash('success', 'Wisata berhasil ditambah');
        return redirect()->route('MemberIndex');
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
        if ($request->hasFile('image')) {
            $image_path = public_path() . '/image_upload/' . $filename;
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
        $data->id_categori = Auth::user()->id_categori;
        $data->id_user = Auth::user()->id;

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
        $filename = $data->foto;
        $image_path = public_path() . '/image_upload/' . $filename;
        if (file_exists($image_path))
            File::delete($image_path);
        $data->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('wisata.index');
    }
}
