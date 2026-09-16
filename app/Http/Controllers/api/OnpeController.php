<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{

    public function grupo_votacion($grupo_votacion)
    {
        $acta = DB::select('call sp_getGrupoVotacion(?)', [$grupo_votacion]);

        $success = isset($acta);
        $status = $success ? 200 : 404;

        $acta = [
            'success' => $success,
            'acta' => $success ? $acta : null,
            'message' => $success ? 'Acta encontrada' : 'No existe esta acta',
            'status' => $status
        ];
        return response()->json($acta, $status);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
