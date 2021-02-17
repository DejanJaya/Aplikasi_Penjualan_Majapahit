<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hadiah;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_hadiah = Hadiah::all();
        return view('hadiah/index', ['hadiah' => $data_hadiah]);
    }

    public function hadiahuser()
    {
        $datapoint = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->sum('transaksi.point');

        $data_hadiah = Hadiah::all();
        return view('hadiahuser/index', ['hadiah' => $data_hadiah, 'datapoint' => $datapoint]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hadiah/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hadiah::create([
            'point' => $request->point,
            'daftar_hadiah' => $request->daftar_hadiah

        ]);
        return redirect()->route('hadiah.index')->with('status', 'Data Berhasil ditambahkan!');
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
    public function edit($id_hadiah)
    {
        $datahadiah = Hadiah::find($id_hadiah);
        return view('hadiah/edit', ['hadiah' => $datahadiah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hadiah)
    {
        $hadiah = Hadiah::find($id_hadiah);
        $hadiah->point = $request->point;
        $hadiah->daftar_hadiah = $request->daftar_hadiah;
        $hadiah->save();

        return redirect()->route('hadiah.index')->with('status', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hadiah)
    {
        $hadiah = Hadiah::find($id_hadiah);
        $hadiah->delete();

        return redirect()->route('hadiah.index')->with('status', 'Data Berhasil dihapus!');
    }
}
