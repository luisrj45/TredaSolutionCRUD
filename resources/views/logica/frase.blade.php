@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  Frase
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
                              <form id="search-form" method="GET" autocomplete="off" action="{{url('frase')}}">
                                <div class="input-group input-group-sm">
                                  <label>Dada una frase, devolver la frase donde las palabras con mayor a 5 letras esten al revés 
                                    <input data-toggle="tooltip" data-placement="bottom" title="Ingrese el Numero" type="search" name="search" class="form-control float-right" placeholder="Buscar..." value="{{ $cadena }}">
                                          <div class="input-group-append">
                                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>Buscar</button>
                                          </div>
                                        </label>
                                  </div>
                                </form>
                                <span>parrafo convertido <strong>@foreach ($parrafo as $parr)
                                  {{ $parr }}
                                @endforeach </strong></span>
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
