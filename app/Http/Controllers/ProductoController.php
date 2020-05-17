<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoModel;
use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Requests\ProductoImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
class ProductoController extends Controller
{
	public function index(Request $request)
        {
            $title='Productos';
            $query=trim($request->get('search'));
                 $productos=DB::table('productos as p')
                 ->join('tiendas as t','t.id_tienda','=','p.id')
                ->orwhere('p.sku','LIKE','%'.$query.'%')
                ->where('p.deleted_at','=',null)
                ->orwhere('p.nombre','LIKE','%'.$query.'%')
                ->where('p.deleted_at','=',null)
                ->orwhere('p.valor','LIKE','%'.$query.'%')
                ->where('p.deleted_at','=',null)
                ->selectRaw('p.nombre as producto_nombre,t.nombre as tienda_nombre,p.id as id_producto,p.sku,p.descripcion,p.valor,p.tienda,p.imagen,t.id,t.id_tienda,t.fecha_apertura')
                ->orderBy('p.id','desc')
                ->paginate(10);
                $num=$productos->firstItem();
                 $tienda=DB::table('tiendas')->get();

               
                return view('producto.index',compact('title','num','tienda','productos','query'));
        }
    public function store (ProductoStoreRequest $request)
        {
         
              $image = $request->file('imagen');
              //dd($image);
              $nombre_imagen =rand() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('images/productos'), $nombre_imagen);
              $pact= "/images/productos/".$nombre_imagen;

                $producto=new ProductoModel;
                $producto->sku=$request->post('sku');
                $producto->nombre=$request->post('nombre');
                $producto->descripcion=$request->post('descripcion');
                $producto->valor=$request->post('valor');
                $producto->imagen=$pact;
                $producto->tienda=$request->post('tienda');
                $producto->save();
            

        }
        function imagen(ProductoImageRequest $request)
            {
            $codigo=$request->get('id');
              $image = $request->file('imagen');
              $nombre_imagen =rand() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('images/productos'), $nombre_imagen);
              $pact= "/images/productos/".$nombre_imagen;
              if($codigo!="" && $codigo!=null){
              $producto=ProductoModel::findOrFail($codigo);
                $producto->imagen=$pact;
                 $producto->update();
              return response()->json([
               'message'   => 'Operacion Exitosa',
               'uploaded_image' => '<img src="/images/productos/'.$nombre_imagen.'" class="img-thumbnail" width="300" />',
               'class_name'  => 'alert-success','codi'  => $codigo
              ]);
             }
             else
             {
              return response()->json([
               'message'   => $validation->errors()->all(),
               'uploaded_image' => '',
               'class_name'  => 'alert-danger'
              ]);
             }
            }
        public function update(ProductoUpdateRequest $request, $id)
          {
              
              	$producto=ProductoModel::findOrFail($id);
                $producto->sku=$request->get('sku');
                $producto->nombre=$request->get('nombre');
                $producto->descripcion=$request->get('descripcion');
                $producto->valor=$request->get('valor');
                $producto->tienda=$request->get('tienda');
              	$producto->update();
          }
      public function delete(Request $request, $id)
	    {
	        $producto=ProductoModel::findOrFail($id);
	       $producto->delete();

	    }
}
