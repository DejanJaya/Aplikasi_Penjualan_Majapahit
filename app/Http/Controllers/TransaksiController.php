<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\CartCondition;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Produk::when(request('search'), function ($query) {
            return $query->where('nama', 'like', '%' . request('search') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('transaksi.index', compact('products'));
    }

    public function clear()
    {

        return redirect()->back();
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
        // $dataproduk = Produk::find($id_produk);

        Transaksi::create([
            'no_invoice' => $request->no_invoice,
            'nama_produk' => $request->nama,
            'id_user' => Auth::user()->id,
            'nama_user' => Auth::user()->name,
            'bayar' => $request->bayar,
            'subtotal' => $request->subtotal,
            'point' => $request->point
        ]);
        // dd($trans);
        return redirect()->route('transaksi.index')->with('status', 'Data Berhasil ditambahkan!');
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

    public function pembayaran($id_produk)
    {
        $dataproduk = Produk::find($id_produk);

        return view('transaksi/transaksis', ['produk' => $dataproduk]);
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
