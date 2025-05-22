<?php

namespace App\Models\Letter\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionEntidadM extends Model
{

    // La funcón lista el catalogo de entidad
    public function list()
    {
        $result = DB::table(table: 'correspondencia.cat_entidad')
            ->select('id_cat_entidad as id', 'descripcion as descripcion')
            ->where('estatus', '=', true)
            ->orderBy('descripcion', 'ASC')
            ->get();

        return $result;
    }


    public function listEdit()
    {
        $result = DB::table(table: 'correspondencia.cat_entidad')
            ->select('id_cat_entidad as id', 'descripcion as descripcion')
            ->where('id_cat_entidad', '=', 14)
            ->orderBy('descripcion', 'ASC')
            ->get();

        return $result;
    }


    // La funcón obtiene el estado actual del id que se selecciono
    public function edit($id)
    {
        return DB::table('correspondencia.cat_entidad')
            ->select('id_cat_entidad as id', 'descripcion')
            ->where('id_cat_entidad', $id)
            ->where('estatus', '=', true)
            ->first();
    }

}
