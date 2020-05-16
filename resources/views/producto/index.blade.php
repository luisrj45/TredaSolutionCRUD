@extends ('layouts.menu')
@section ('contenido')
<div class="card">
      <div class="card-header">
                <h3 class="card-title">
                  Productos
                </h3>
                  <span style="position: absolute;top: 10px;right: 40px;" data-toggle="tooltip" data-placement="bottom" title="Nueva Tienda">
                         <a class="btn btn-success" data-toggle="modal" data-target="#modal-default-producto">Nuevo</a>
                    </span>
        </div><!-- /.card-header -->

          @include('producto.create')
          @include('producto.view')
          @include('producto.image')
          
          @include('producto.delete')
          

            <!-- /.card-header -->
        <div class="card-body">
                
                            <div class="card-tools">
                              <form id="search-form" method="GET" autocomplete="off" action="{{url('tienda')}}">
                                <div class="input-group input-group-sm">
                                    <input data-toggle="tooltip" data-placement="bottom" title="Buscar por: SKU, nombre y valor" type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="">
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                          </div>
                                  </div>
                                </form>
                            </div>

						              <div class="table-responsive" style="min-height: 200px;">
						                <table class="table table-bordered">
						                  <thead>
						                    <tr>
						                      <th>#</th>
						                      <th>Imagén</th>
                                  <th>SKU</th>
                                  <th>Nombre</th>
                                  <th>Valor</th>
                                  <th>Descripción</th>
                                  <th>Tienda</th>
						                      <th>Opciones</th>
						                    </tr>
						                  </thead>
						                  <tbody >
                                  @foreach ($productos as $product)
                                    <tr>
                                      <td>{{ $num++ }}<input type="hidden" name="code" value="{{ $product->id_producto }}"></td>
                                      <td><img class="foto" src="{{ $product->imagen }}" alt="" width="50px" height="50px" /></td>
                                      <td>{{ $product->sku }}</td>
                                      <td>{{ $product->producto_nombre}}</td>
                                      <td>{{ number_format($product->valor) }}</td>
                                      <td><span data-toggle="tooltip" data-placement="bottom" title="{{ $product->descripcion }}">{{ Str::limit($product->descripcion,20) }}</span></td>
                                      <td>{{ $product->producto_nombre }}</td>
                                      <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Ver Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-primary btn-xs view">Ver
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Editar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-info btn-xs">Editar
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Eliminar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-danger btn-xs delete_btn" >Eliminar
                                      </td>
                                    </tr>
                                  @endforeach
                                  @if($productos->total()==0)
                                        <tr>
                                          <td colspan="8">No existen productos registradas</td>
                                        </tr>
                                      @endif
						                  </tbody>
						                </table>
                        </div>
                        <br>
                            
                            {{ $productos->links()}}

                   	
        </div><!-- /.card-body -->
</div>
            @include('producto.edit')

        <script type="text/javascript">
            function cargar(){
              location.reload();
            }
             
            function cargarInicio(){
              location.replace("/productos")();
            }
        </script>
          
@endsection
