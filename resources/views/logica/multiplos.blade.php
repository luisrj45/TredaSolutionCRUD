@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  Multiplos
                </h3>
        </div><!-- /.card-header -->

        <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  	<div class="chart tab-pane active" id="revenue-chart">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="card-tools">
                              <form id="search-form" method="GET" autocomplete="off" action="{{url('multiplos')}}">
                                <div class="input-group input-group-sm">
                                    <input data-toggle="tooltip" data-placement="bottom" title="Buscar por: ID, nombre y fecha de apertura" type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="{{ $query }}">
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>Buscar</button>
                                          </div>
                                  </div>
                                </form>
                                <span>Los multiplos de 3 y 5 menores a <strong>{{ $query }}</strong> son: </span>
                                <label for="">@foreach ($valores as $mult){{ $mult }},@endforeach</label>
                                <br>
                                <span>La suma de los multiplos de 3 y 5 menores a <strong>{{ $query }}</strong> es : {{ $suma }}</span>
                            </div>
                          </div>

						              
                            
	                </div>
                           

                  </div>
                  </div>
                   	
                </div>
        </div><!-- /.card-body -->
</div>
          
        <script type="text/javascript">
            function cargar(){
              location.reload();
            }
             
            function cargarInicio(){
              location.replace("/tiendas")();
            }
        </script>
          
@endsection
