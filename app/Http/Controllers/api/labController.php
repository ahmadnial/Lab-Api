<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class labController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            try {
                $listAll = DB::select("select b.fs_mr, c.FS_NM_PASIEN, a.FS_KD_REG, a.fd_tgl_jam_trs from TA_TRS_BILLING a
                left join TA_REGISTRASI b on a.FS_KD_REG = b.FS_KD_REG
                left join tc_mr c on b.FS_MR = c.FS_MR where a.FS_KD_LAYANAN='PEN03' and a.FD_TGL_TRS='2022-06-01'");
                return response()->json($listAll, Response::HTTP_OK);
            } catch (QueryException $e) {
                $error = [
                    'error' => $e->getMessage()
                ];
                return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
