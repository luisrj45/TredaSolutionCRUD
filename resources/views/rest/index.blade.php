@extends ('layouts.menu')
@section ('contenido')
<div class="card">
      <div class="card-header">
                <h3 class="card-title">
                  Servicio Rest <br>
                  

                </h3>
                  <p>Teniendo como base el primer punto, desarrolle un servicio SOAP o REST que dado
el ID de la tienda muestre los productos asociados a esta. Se debe retornar en un
JSON la información y la imagen se debe retornar en base 64.</p>
        </div><!-- /.card-header -->
            <!-- /.card-header -->
        <div class="card-body">
                
                            <div class="card-tools">
                              <form id="search-form" autocomplete="off" >
                                <div class="input-group input-group-sm">
                                    <input onkeyup="buscarp(this.value)" type="search" name="search" class="form-control float-right" placeholder="Buscar...">
                                  </div>
                              <div class="" id="message" style="display: none"></div>

                                </form>
                            </div>

						              
                        <br>
                            

                   	
        </div><!-- /.card-body -->
</div>
<script type="text/javascript">
 function buscarp(cod) {
        let dat=$.get('/rest_api/'+cod);
       console.log(dat);
       

}
</script>
@endsection
