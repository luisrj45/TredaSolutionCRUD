<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TiendaModel;
use App\Http\Requests\TiendaStoreRequest;
use App\Http\Requests\TiendaUpdateRequest;
use DB;
class TiendaController extends Controller
{
	public function index(Request $request)
        {
            $title='Tiendas';
            $query=trim($request->get('search'));
                $tiendas=DB::table('tiendas')
            	->orwhere('id','LIKE','%'.$query.'%')
            	->where('deleted_at','=',null)
            	->orwhere('nombre','LIKE','%'.$query.'%')
            	->where('deleted_at','=',null)
            	->orwhere('fecha_apertura','LIKE','%'.$query.'%')
            	->where('deleted_at','=',null)
                ->orderBy('id_tienda','desc')
                ->paginate(10);
                $num=$tiendas->firstItem();
               
                return view('tienda.index',compact('title','num','tiendas','query'));
        }
    public function store (TiendaStoreRequest $request)
        {
            $tienda=new TiendaModel;
            $tienda->id=$request->get('id');
            $tienda->nombre=$request->get('nombre');
            $tienda->fecha_apertura=date('Y-m-d ',strtotime($request->get('fecha')));
            $tienda->save();
            

        }
        public function update(TiendaUpdateRequest $request, $id)
          {
              	$tienda=TiendaModel::findOrFail($id);
                $tienda->id=$request->get('id');
            	$tienda->nombre=$request->get('nombre');
            	$tienda->fecha_apertura=date('Y-m-d ',strtotime($request->get('fecha')));
              	$tienda->update();
          }
      public function delete(Request $request, $id)
	    {
	        $tienda=TiendaModel::findOrFail($id);
	       $tienda->delete();

	    }
}
