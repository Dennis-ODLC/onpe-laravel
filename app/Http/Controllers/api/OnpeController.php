<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{
    // =====================================================
    // VALIDACIONES
    // =====================================================

    public function sp_isDepartamento($detalle)
    {
        $resultado = DB::select(
            "CALL sp_isDepartamento(?)",
            [$detalle]
        );

        $success = !empty($resultado);

        return response()->json([
            'success' => $success,
            'data' => $success ? $resultado : null,
            'message' => $success
                ? 'Consulta realizada correctamente'
                : 'Departamento no encontrado'
        ], $success ? 200 : 404);
    }


    public function sp_isProvincia($detalle)
    {
        $resultado = DB::select(
            "CALL sp_isProvincia(?)",
            [$detalle]
        );

        $success = !empty($resultado);

        return response()->json([
            'success' => $success,
            'data' => $success ? $resultado : null,
            'message' => $success
                ? 'Consulta realizada correctamente'
                : 'Provincia no encontrada'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // DEPARTAMENTOS
    // =====================================================

    public function sp_getDepartamentos($inicio, $fin)
    {
        $departamentos = DB::select(
            "CALL sp_getDepartamentos(?, ?)",
            [$inicio, $fin]
        );

        $success = !empty($departamentos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $departamentos : null,
            'message' => $success
                ? 'Departamentos encontrados'
                : 'No se encontraron departamentos'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // PROVINCIAS
    // =====================================================

    public function sp_getProvincias($idDepartamento)
    {
        $provincias = DB::select(
            "CALL sp_getProvincias(?)",
            [$idDepartamento]
        );

        $success = !empty($provincias);

        return response()->json([
            'success' => $success,
            'data' => $success ? $provincias : null,
            'message' => $success
                ? 'Provincias encontradas'
                : 'No se encontraron provincias'
        ], $success ? 200 : 404);
    }


    public function sp_getProvinciasbyDepartamento($departamento)
    {
        $provincias = DB::select(
            "CALL sp_getProvinciasbyDepartamento(?)",
            [$departamento]
        );

        $success = !empty($provincias);

        return response()->json([
            'success' => $success,
            'data' => $success ? $provincias : null,
            'message' => $success
                ? 'Provincias encontradas'
                : 'No se encontraron provincias'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // DISTRITOS
    // =====================================================

    public function sp_getDistritos($idProvincia)
    {
        $distritos = DB::select(
            "CALL sp_getDistritos(?)",
            [$idProvincia]
        );

        $success = !empty($distritos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $distritos : null,
            'message' => $success
                ? 'Distritos encontrados'
                : 'No se encontraron distritos'
        ], $success ? 200 : 404);
    }


    public function sp_getDistritosByProvincia($provincia)
    {
        $distritos = DB::select(
            "CALL sp_getDistritosByProvincia(?)",
            [$provincia]
        );

        $success = !empty($distritos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $distritos : null,
            'message' => $success
                ? 'Distritos encontrados'
                : 'No se encontraron distritos'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // LOCALES DE VOTACIÓN
    // =====================================================

    public function sp_getLocalesVotacion($idDistrito)
    {
        $locales = DB::select(
            "CALL sp_getLocalesVotacion(?)",
            [$idDistrito]
        );

        $success = !empty($locales);

        return response()->json([
            'success' => $success,
            'data' => $success ? $locales : null,
            'message' => $success
                ? 'Locales de votación encontrados'
                : 'No se encontraron locales de votación'
        ], $success ? 200 : 404);
    }


    public function sp_getLocalesVotacionByDistrito($provincia, $distrito)
    {
        $locales = DB::select(
            "CALL sp_getLocalesVotacionByDistrito(?, ?)",
            [$provincia, $distrito]
        );

        $success = !empty($locales);

        return response()->json([
            'success' => $success,
            'data' => $success ? $locales : null,
            'message' => $success
                ? 'Locales de votación encontrados'
                : 'No se encontraron locales de votación'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // GRUPOS DE VOTACIÓN
    // =====================================================

    public function sp_getGruposVotacion($idLocalVotacion)
    {
        $grupos = DB::select(
            "CALL sp_getGruposVotacion(?)",
            [$idLocalVotacion]
        );

        $success = !empty($grupos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $grupos : null,
            'message' => $success
                ? 'Grupos de votación encontrados'
                : 'No se encontraron grupos de votación'
        ], $success ? 200 : 404);
    }


    public function sp_getGruposVotacionByProvinciaDistritoLocal(
        $provincia,
        $distrito,
        $local
    ) {
        $grupos = DB::select(
            "CALL sp_getGruposVotacionByProvinciaDistritoLocal(?, ?, ?)",
            [$provincia, $distrito, $local]
        );

        $success = !empty($grupos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $grupos : null,
            'message' => $success
                ? 'Grupos de votación encontrados'
                : 'No se encontraron grupos de votación'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // GRUPO DE VOTACIÓN
    // =====================================================

    public function grupo_votacion($grupo_votacion)
    {
        $acta = DB::select(
            "CALL sp_getGrupoVotacion(?)",
            [$grupo_votacion]
        );

        $success = !empty($acta);
        $status = $success ? 200 : 404;

        return response()->json([
            'success' => $success,
            'acta' => $success ? $acta : null,
            'message' => $success
                ? 'Acta encontrada'
                : 'No existe esta acta',
            'status' => $status
        ], $status);
    }


    public function sp_getGrupoVotacion($grupo_votacion)
    {
        return $this->grupo_votacion($grupo_votacion);
    }


    public function sp_getGrupoVotacionByProvinciaDistritoLocalGrupo(
        $departamento,
        $provincia,
        $distrito,
        $local,
        $grupo
    ) {
        $acta = DB::select(
            "CALL sp_getGrupoVotacionByProvinciaDistritoLocalGrupo(?, ?, ?, ?, ?)",
            [
                $departamento,
                $provincia,
                $distrito,
                $local,
                $grupo
            ]
        );

        $success = !empty($acta);

        return response()->json([
            'success' => $success,
            'data' => $success ? $acta : null,
            'message' => $success
                ? 'Acta encontrada'
                : 'No existe esta acta'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // VOTOS
    // =====================================================

    public function sp_getVotos($inicio, $fin)
    {
        $votos = DB::select(
            "CALL sp_getVotos(?, ?)",
            [$inicio, $fin]
        );

        $success = !empty($votos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $votos : null,
            'message' => $success
                ? 'Votos encontrados'
                : 'No se encontraron votos'
        ], $success ? 200 : 404);
    }


    public function sp_getVotosDepartamento($departamento)
    {
        $votos = DB::select(
            "CALL sp_getVotosDepartamento(?)",
            [$departamento]
        );

        $success = !empty($votos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $votos : null,
            'message' => $success
                ? 'Votos encontrados'
                : 'No se encontraron votos'
        ], $success ? 200 : 404);
    }


    public function sp_getVotosProvincia($provincia)
    {
        $votos = DB::select(
            "CALL sp_getVotosProvincia(?)",
            [$provincia]
        );

        $success = !empty($votos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $votos : null,
            'message' => $success
                ? 'Votos encontrados'
                : 'No se encontraron votos'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // DISTRITOS POR DEPARTAMENTO
    // =====================================================

    public function sp_getDistritosDepartamento($departamento)
    {
        $distritos = DB::select(
            "CALL sp_getDistritosDepartamento(?)",
            [$departamento]
        );

        $success = !empty($distritos);

        return response()->json([
            'success' => $success,
            'data' => $success ? $distritos : null,
            'message' => $success
                ? 'Distritos encontrados'
                : 'No se encontraron distritos'
        ], $success ? 200 : 404);
    }


    // =====================================================
    // LOCALES POR DEPARTAMENTO
    // =====================================================

    public function sp_getLocalesVotacionDepartamento($departamento)
    {
        $locales = DB::select(
            "CALL sp_getLocalesVotacionDepartamento(?)",
            [$departamento]
        );

        $success = !empty($locales);

        return response()->json([
            'success' => $success,
            'data' => $success ? $locales : null,
            'message' => $success
                ? 'Locales de votación encontrados'
                : 'No se encontraron locales de votación'
        ], $success ? 200 : 404);
    }
}