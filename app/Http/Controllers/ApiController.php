<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hadiah;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function get_all_hadiah()
    {
        return response()->json(Hadiah::all(), 200);
    }

    public function get_point()
    {
        return response()->json(Transaksi::all(), 200);
    }

    public function insert_data_hadiah(Request $request)
    {
        $insert_hadiah = new Hadiah;
        $insert_hadiah->point = $request->point;
        $insert_hadiah->daftar_hadiah = $request->daftar_hadiah;
        $insert_hadiah->save();
        return response([
            'status' => 'ok',
            'message' => 'Hadiah Disimpan',
            'data' => $insert_hadiah
        ], 200);

        // $status = "ok";
        // return view('hadiah.index', ['name' => 'james']);
    }

    public function update_data_hadiah(Request $request, $id)
    {
        $check_hadiah = Hadiah::firstWhere('id_hadiah', $id);
        if ($check_hadiah) {
            $data_hadiah = Hadiah::find($id);
            $data_hadiah->point = $request->point;
            $data_hadiah->daftar_hadiah = $request->daftar_hadiah;
            $data_hadiah->save();
            return response([
                'status' => 'ok',
                'message' => 'Hadiah Disimpan',
                'data' => $data_hadiah
            ], 200);
        } else {
            return response([
                'status' => 'ok',
                'message' => 'Kode Hadiah Tidak Ditemukan!',
            ], 404);
        }
    }

    public function delete_data_hadiah($id)
    {
        $check_hadiah = Hadiah::firstWhere('id_hadiah', $id);
        if ($check_hadiah) {
            Hadiah::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'not_found',
                'message' => 'Kode hadiah tidak ditemukan'
            ], 404);
        }
    }
}
