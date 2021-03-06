@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  Tiendas
                </h3>
                  <span style="position: absolute;top: 10px;right: 40px;" data-toggle="tooltip" data-placement="bottom" title="Nueva Tienda">
                         <a class="btn btn-success" data-toggle="modal" data-target="#modal-default-tienda">Nueva</a>
                    </span>
        </div><!-- /.card-header -->

          @include('tienda.create')
          @include('tienda.view')
          


            <!-- /.card-header -->
        <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  	<div class="chart tab-pane active" id="revenue-chart">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="card-tools">
                              <form id="search-form" method="GET" autocomplete="off" action="{{url('tienda')}}">
                                <div class="input-group input-group-sm">
                                    <input data-toggle="tooltip" data-placement="bottom" title="Buscar por: ID, nombre y fecha de apertura" type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="{{ $query }}">
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                          </div>
                                  </div>
                                </form>
                            </div>
                          </div>

						              <div class="card-body table-responsive p-0" style="min-height: 200px;">
						                <table class="table table-bordered table-striped table-head-fixed">
						                  <thead>
						                    <tr>
						                      <th>#</th>
						                      <th>ID</th>
                                  <th>Nombre</th>
						                      <th>Fecha Apertura</th>
						                      <th>Opciones</th>
						                    </tr>
						                  </thead>
						                  <tbody >
                                  @foreach ($tiendas as $tienda)
                                    <tr>
                                      <td>{{ $num++ }}<input type="hidden" name="code" value="{{ $tienda->id_tienda }}"></td>
                                      <td>{{ $tienda->id }}</td>
                                      <td>{{ $tienda->nombre }}</td>
                                      <td>@php echo date("d/m/Y", strtotime($tienda->fecha_apertura)); @endphp</td>
                                      <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Ver Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-primary btn-xs view">Ver
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Editar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-info btn-xs">Editar
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Eliminar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-danger btn-xs delete_btn" >Eliminar
                                      </td>
                                    </tr>
                                  @endforeach
                                  @if($tiendas->total()==0)
                                        <tr>
                                          <td colspan="5">No existen tiendas registradas</td>
                                        </tr>
                                      @endif
						                  </tbody>
						                </table>
                        </div>
                        <br>
                            
	                </div>
                            {{ $tiendas->links()}}

                  </div>
                  </div>
                   	
                </div>
        </div><!-- /.card-body -->
</div>
            @include('tienda.edit')
            @include('tienda.delete')

        <script type="text/javascript">
            function cargar(){
              location.reload();
            }
             
            function cargarInicio(){
              location.replace("/tiendas")();
            }
        </script>
          
@endsection
