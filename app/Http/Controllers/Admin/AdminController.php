<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categori;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = [
            ['title' => 'Pantai Gigi Hiu', 'descripsi' => 'Gugusan batu karang yg ada di pantai Pegadung kecamatan Kelumbayan Kabupaten Tanggamus, Lampung', 'gambar' => '1.jpg'],
            ['title' => 'Menara Siger', 'descripsi' => 'Menara siger adalah simbol bangunan masa depan representasi fenomena masyarakat lampung', 'gambar' => '2.jpg'],
            ['title' => 'Pantai Labuan Jukung', 'descripsi' => 'Pantai labuan jukung mempunyai pemandangan alam yg indah, ombak yg lumayan mengasyikkan untuk beberapa peselancar, nyaman untuk tiap-tiap kegiatan pantai', 'gambar' => '3.jpg'],
            ['title' => 'Pulau Pahawang', 'descripsi' => 'Pulau Pahawang merupakan salah satu tempat wisata di Lampung yang menjadi surga bagi para pecinta diving, snorkeling atau sekedar menikmati pemandangan saja', 'gambar' => '4.jpg'],
        ];
        return view('admin.dashboard', ['carousel' => $carousel]);
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
