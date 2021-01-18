<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Rating;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumbotron = [
            'title' => 'Nikmati Liburan Santai sepuasnyaa...',
            'descripsi' => 'Pantai Ancol memiliki fasilitas yang cukup lengkap dan wahana yang menarik, sehingga mampu menarik perhatian wisatawan. Salah satunya adalah Atlantis ...',
            'isi' => 'Ini dia pantai yang paling populer di kalangan warga Jakarta! Pantai Ancol memiliki fasilitas yang cukup lengkap dan wahana yang menarik, sehingga mampu menarik perhatian wisatawan. Salah satunya adalah Atlantis Water Adventure (AWA), sebuah kolam permainan air yang berdiri di atas lahan seluas 5 hektar. Terdapat delapan kolam renang utama dengan beragam wahana di dalamnya. Selain AWA, masih ada Ocean Dream Samudra. Di wahana ini, kamu bisa mengenal lebih jauh tentang aneka ragam satwa air dan menikmati film 4D. Di kawasan Ancol juga, terdapat akuarium raksasa bernama Seaworld yang memperlihatkan suasana alam bawah laut yang begitu indah dan menarik.',
            'gambar' => 'https://ik.imagekit.io/tvlk/blog/2020/01/Pantai-Ancol-1024x685.jpg?tr=dpr-1,w-675',
        ];

        $carousel = [
            ['title' => 'Pantai Gigi Hiu', 'descripsi' => 'Gugusan batu karang yg ada di pantai Pegadung kecamatan Kelumbayan Kabupaten Tanggamus, Lampung', 'gambar' => '1.jpg'],
            ['title' => 'Menara Siger', 'descripsi' => 'Menara siger adalah simbol bangunan masa depan representasi fenomena masyarakat lampung', 'gambar' => '2.jpg'],
            ['title' => 'Pantai Labuan Jukung', 'descripsi' => 'Pantai labuan jukung mempunyai pemandangan alam yg indah, ombak yg lumayan mengasyikkan untuk beberapa peselancar, nyaman untuk tiap-tiap kegiatan pantai', 'gambar' => '3.jpg'],
            ['title' => 'Pulau Pahawang', 'descripsi' => 'Pulau Pahawang merupakan salah satu tempat wisata di Lampung yang menjadi surga bagi para pecinta diving, snorkeling atau sekedar menikmati pemandangan saja', 'gambar' => '4.jpg'],
        ];

        $wisata = Wisata::simplePaginate(2);
        // dd($wisata);
        return view('user.index', ['jumbotron' => $jumbotron, 'carousel' => $carousel, 'wisata' => $wisata]);
    }

    public function about()
    {
        return view('user.about');
    }

    public function pantai()
    {
        $pantai = DB::table('wisata')
            ->join('categori', 'wisata.id_categori', '=', 'categori.id')
            ->select('wisata.id', 'wisata.nama as nama_wisata', 'wisata.descripsi', 'wisata.foto', 'categori.nama')
            ->where('categori.nama', '=', 'pantai')
            ->simplePaginate(10);
        // dd($pantai);
        return view('user.pantai', ['pantai' => $pantai]);
    }
    public function gunung()
    {
        $gunung = DB::table('wisata')
            ->join('categori', 'wisata.id_categori', '=', 'categori.id')
            ->select('wisata.id', 'wisata.nama as nama_wisata', 'wisata.descripsi', 'wisata.foto', 'categori.nama')
            ->where('categori.nama', '=', 'gunung')
            ->simplePaginate(10);
        // dd($pantai);
        return view('user.gunung', ['gunung' => $gunung]);
    }
    public function taman_wisata()
    {
        $taman_wisata = DB::table('wisata')
            ->join('categori', 'wisata.id_categori', '=', 'categori.id')
            ->select('wisata.id', 'wisata.nama as nama_wisata', 'wisata.descripsi', 'wisata.foto', 'categori.nama')
            ->where('categori.nama', '=', 'taman wisata')
            ->simplePaginate(10);
        // dd($pantai);
        return view('user.taman_wisata', ['taman_wisata' => $taman_wisata]);
    }
    public function air_terjun()
    {
        $air_terjun = DB::table('wisata')
            ->join('categori', 'wisata.id_categori', '=', 'categori.id')
            ->select('wisata.id', 'wisata.nama as nama_wisata', 'wisata.descripsi', 'wisata.foto', 'categori.nama')
            ->where('categori.nama', '=', 'air terjun')
            ->simplePaginate(10);
        // dd($pantai);
        return view('user.air_terjun', ['air_terjun' => $air_terjun]);
    }
    public function all_categori()
    {
        $all_categori = DB::table('wisata')
            ->join('categori', 'wisata.id_categori', '=', 'categori.id')
            ->select('wisata.id', 'wisata.nama as nama_wisata', 'wisata.descripsi', 'wisata.foto', 'categori.nama')
            ->simplePaginate(10);
        // dd($pantai);
        return view('user.all_categori', ['all_categori' => $all_categori]);
    }

    public function show_wisata($id)
    {
        $showWisata = Wisata::findOrFail($id);
        $komentar = DB::table('komentar_wisata')
            ->join('wisata', 'wisata.id', '=', 'komentar_wisata.id_wisata')
            ->select('komentar_wisata.*')
            ->where('komentar_wisata.id_wisata', '=', $id)
            ->simplePaginate(3);
        $show_rating = DB::table('rating')
            ->join('wisata', 'wisata.id', '=', 'rating.id_wisata')
            ->where('rating.id_wisata', '=', $id)
            ->avg('rating');
        // ->select('rating')
        // ->get();
        // dd($show_rating);
        return view('user.showWisata', ['showWisata' => $showWisata, 'komentar' => $komentar, 'rating' => $show_rating]);
    }

    public function komentar(Request $request)
    {
        $item = [
            'id_wisata' => request()->segment(2),
            // 'parent_id' => '',
            'nama' => $request->input('nama'),
            'komentar' => $request->input('komentar'),
        ];
        // dd($item);
        Komentar::create($item);
        return redirect('show_wisata/' . request()->segment(2));
    }

    public function rating(Request $request)
    {
        if ($request->input('selected_rating') == null) {
            # code...
            return redirect('show_wisata/' . request()->segment(2));
        } else {
            $item = [
                'id_wisata' => request()->segment(2),
                'rating' => $request->input('selected_rating'),
            ];
        }

        // dd($item);
        Rating::create($item);
        return redirect('show_wisata/' . request()->segment(2));
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
