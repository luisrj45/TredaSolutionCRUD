@extends ('layouts.menu')
@section ('contenido')
<div class="card">
      <div class="card-header">
                <h3 class="card-title">
                  Servicio Rest
                </h3>
                  
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
						                    </tr>
						                  </thead>
						                  <tbody >
                                    <tr>
                                      <td>1</td>
                                      <td><img class="foto" src="/images/productos/976694570.jpeg" alt="" width="50px" height="50px" /></td>
                                      <td>12345</td>
                                      <td>llanta</td>
                                      <td>70000</td>
                                      <td>es una llante</td>
                                      <td>exito</td>
						                  </tbody>
						                </table>
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
