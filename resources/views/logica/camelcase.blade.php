@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  Camel case
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
                              <form id="search-form" method="GET" autocomplete="off" action="{{url('camelcase')}}">
                                <div class="input-group input-group-sm">
                                  <label>Dado un string separado por espacios, guiones y guiones bajos. Se debe implementar una función camel case que transforme la oración
                                    <input data-toggle="tooltip" data-placement="bottom" title="Ingrese el texto" type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="{{ $string }}">
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search">Transformar</i></button>
                                          </div>
                                        </label>
                                  </div>
                                </form>
                                <span>Convertido :</span>
                                <label for="">{{ $str }}</label>
                                <br>
                                
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
