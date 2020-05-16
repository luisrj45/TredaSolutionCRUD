@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  <i class="fab fa-product-hunt mr-1"></i>
                  Tiendas
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" onclick="cargar()" data-toggle="tab">Listar</a>
                    </li>
                    <span data-toggle="tooltip" data-placement="bottom" title="Nueva Tienda">
                      <li class="nav-item">
                         <a class="nav-link" data-toggle="modal" data-target="#modal-default">Nueva</a>
                      </li>
                    </span>
                  </ul>
                </div>
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
                                    <input type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="">
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
                                      <td><input type="hidden" name="code" value="{{ $tienda->id_tienda }}"></td>
                                      <td>{{ $tienda->id }}</td>
                                      <td>{{ $tienda->nombre }}</td>
                                      <td>@php echo date("d/m/Y", strtotime($tienda->fecha_apertura)); @endphp</td>
                                      <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Ver Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-primary btn-xs view"><i class="fas fa-eye">Ver</i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Editar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-info btn-xs"><i class="fas fa-edit">Editar</i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Eliminar Tienda" data-keyboard="true" data-backdrop="static" class="btn btn-danger btn-xs delete_btn" ><i class="fas fa-trash">Eliminar</i>
                                        </a>
                                      </td>
                                    </tr>
                                  @endforeach
						                  </tbody>
						                </table>

                        </div>
                        <br>
                            
	                </div>
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
              location.replace("/tienda")();
            }
        </script>
          
@endsection
