<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-danger-delete" data-keyboard="true" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Tienda</h4>
              <button type="button" class="btn btn-danger close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="eliminar_tienda" autocomplete="off">
                  {{ csrf_field() }}
                              <input id="nombree" type="hidden" class="form-control" name="nombres">
                                <input id="idd" type="hidden" class="form-control" name="idd">
                                <label>Desea eliminar la Tienda?</label><br>
																<span id="tienda_eli"></span>

                    </div>
                    <div class="modal-footer justify-content-between">
                       <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
                        <div class="" id="Cargando_el" style="display: none"></div>
                        <button type="submit" class="btn btn-danger float-right" id="delete">Eliminar</button>
                    </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<script type="text/javascript">
        $(document).ready(function(){
            $('.delete_btn').on('click',function(){
              $('#modal-danger-delete').modal('show');

							$('.table tbody tr').click(function(e)
							{
								var cod = $(this).find('input[type="hidden"]').val();
								var app = @json($tiendas);
								let valores = app.data.filter(valor=>valor.id_tienda == cod)
									 $("#idd").val(valores[0].id_tienda);
									 $("#tienda_eli").html(valores[0].nombre);
                   $("#nombree").val(valores[0].nombre);
									 e.preventDefault();
							});

            });

          $( "#eliminar_tienda" ).submit(function( event ) {
              $('#delete').attr("disabled", true);
              var cod=$('#idd').val();
             //var parametros = $('#save_tienda_eliy').serialize(),
               $.ajax({
                headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                  type: "DELETE",
                  url: "/el_tiend/"+cod,
                  data: $('#eliminar_tienda').serialize(),
                   beforeSend: function(response){
                   $('#Cargando_el').css('display', 'block');
                    $('#Cargando_el').html("Eliminando...");
                    $('#Cargando_el').addClass("alert alert-warning");
                    $('#register').attr("disabled", false);
                    },
                  success: function(response)
                  {
                   $("#form_tienda")[0].reset();
                    $('#Cargando_el').css('display', 'block');
                    $('#Cargando_el').html("Operacion Exitosa");
                    $('#Cargando_el').removeClass();
                    $('#Cargando_el').addClass("alert alert-success");
                    $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#Cargando_el').css('display', 'none') }, 3000);
                    window.location.reload();
                  },
                  error: function(error){
                  $('#Cargando_el').css('display', 'block');
                    $('#Cargando_el').html("Operacion Fallida");
                    $('#Cargando_el').removeClass();
                    $('#Cargando_el').addClass("alert alert-danger");
                    $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#Cargando_el').css('display', 'none') }, 5000);
                  }
              });
              event.preventDefault();
            });
            });
        </script>
