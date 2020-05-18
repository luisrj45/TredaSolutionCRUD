<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelpers;
use DB;
use Illuminate\Support\Facades\Log;
class RestController extends Controller
{
	public function index($id)
        {
            $query=$id;
                 $productos=DB::table('productos as p')
                 ->join('tiendas as t','t.id_tienda','=','p.tienda')
                ->selectRaw('p.nombre as producto_nombre,t.nombre as tienda_nombre,p.id as id_producto,p.sku,p.descripcion,p.valor,p.tienda,p.imagen,t.id,t.id_tienda,t.fecha_apertura')
                ->where('t.id_tienda','=',$query)
                ->where('p.deleted_at','=',null)
                ->orderBy('p.id','desc')
                ->get();
                //reemplazo las imagenes en base 64 de cada una de los registro obtenidos
                  for ($i=0; $i <count($productos) ; $i++) { 
                    $productos[$i]->imagen=mb_convert_encoding(base64_decode($productos[$i]->imagen), 'UTF-8', 'UTF-8');
                  }
                //dd($productos);
                  Log::channel('slack')->info("el usuario busco la tienda :".$query);
                $respuesta=ApiHelpers::createApiResponse(false,200,'',$productos);
                return response()->json($respuesta,200) ;

        }
    }