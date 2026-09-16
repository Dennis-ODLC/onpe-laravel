<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OnpeController;

Route::controller(OnpeController::class)->group(function () {

    Route::get(
        'grupo_votacion/{grupo_votacion}',
        'grupo_votacion'
    );

    Route::get(
        'sp_isDepartamento/{detalle}',
        'sp_isDepartamento'
    );

    Route::get(
        'sp_isProvincia/{detalle}',
        'sp_isProvincia'
    );

    Route::get(
        'sp_getDepartamentos/{inicio}/{fin}',
        'sp_getDepartamentos'
    );

    Route::get(
        'sp_getProvincias/{idDepartamento}',
        'sp_getProvincias'
    );

    Route::get(
        'sp_getProvinciasbyDepartamento/{departamento}',
        'sp_getProvinciasbyDepartamento'
    );

    Route::get(
        'sp_getDistritos/{idProvincia}',
        'sp_getDistritos'
    );

    Route::get(
        'sp_getDistritosByProvincia/{provincia}',
        'sp_getDistritosByProvincia'
    );

    Route::get(
        'sp_getLocalesVotacion/{idDistrito}',
        'sp_getLocalesVotacion'
    );

    Route::get(
        'sp_getLocalesVotacionByDistrito/{provincia}/{distrito}',
        'sp_getLocalesVotacionByDistrito'
    );

    Route::get(
        'sp_getGruposVotacion/{idLocalVotacion}',
        'sp_getGruposVotacion'
    );

    Route::get(
        'sp_getGruposVotacionByProvinciaDistritoLocal/{provincia}/{distrito}/{local}',
        'sp_getGruposVotacionByProvinciaDistritoLocal'
    );

    Route::get(
        'sp_getGrupoVotacion/{grupo_votacion}',
        'sp_getGrupoVotacion'
    );

    Route::get(
        'sp_getGrupoVotacionByProvinciaDistritoLocalGrupo/{departamento}/{provincia}/{distrito}/{local}/{grupo}',
        'sp_getGrupoVotacionByProvinciaDistritoLocalGrupo'
    );

    Route::get(
        'sp_getVotos/{inicio}/{fin}',
        'sp_getVotos'
    );

    Route::get(
        'sp_getVotosDepartamento/{departamento}',
        'sp_getVotosDepartamento'
    );

    Route::get(
        'sp_getVotosProvincia/{provincia}',
        'sp_getVotosProvincia'
    );

    Route::get(
        'sp_getDistritosDepartamento/{departamento}',
        'sp_getDistritosDepartamento'
    );

    Route::get(
        'sp_getLocalesVotacionDepartamento/{departamento}',
        'sp_getLocalesVotacionDepartamento'
    );
});