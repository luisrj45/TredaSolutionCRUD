<div class="modal fade" id="modal-default-edit" role="dialog" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Editar Tienda</h4>
             <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form id="editar_tienda" autocomplete="off">
                 {{ csrf_field() }}
                               <input id="id_t" type="hidden" class="form-control">
                        <div class="form-group">
                          <div >
                              <span class="text-danger">* Campos obligatorios</span>
                          </div>
                        </div>
                      <div class="form-group">
                            <label for="id" class="control-label">ID<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="ideditar" class="form-control" name="id" >

                                    <span class="text-danger ">
                                        <strong id="ed_id" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="nombreeditar" class="form-control" name="nombre" >

                                    <span class="text-danger ">
                                        <strong id="ed_nombre" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="fecha" class="control-label">Fecha de Apertura(dd-mm-YYYY)<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="fechaeditar" class="form-control" name="fecha" >

                                    <span class="text-danger ">
                                        <strong id="ed_fecha" ></strong>
                                    </span>
                            </div>
                        </div>
                   </div>
                   <div class="modal-footer justify-content-between">
                      <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <div class="" id="message_editar" style="display: none"></div>
                       <button type="submit" class="btn btn-success float-right" id="update">Guardar</button>
                   </div>
           </form>
         </div>
         <!-- /.modal-content -->
       </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
        $('.btn-info').on('click',function(){
             $('#modal-default-edit').modal('show');
               $('.table tbody tr').click(function(e)
               {
                 var cod = $(this).find('input[type="hidden"]').val();
                 var app = @json($tiendas);
                 let valores = app.data.filter(valor=>valor.id_tienda == cod)
                      $("#id_t").val(valores[0].id_tienda);
                      $("#ideditar").val(valores[0].id);
                      $("#nombreeditar").val(valores[0].nombre);
                      $("#fechaeditar").val(valores[0].fecha_apertura);


                    e.preventDefault();
               });
           });
 $.validator.setDefaults({
   submitHandler: function ()
   {
     $('#update').attr("disabled", true);
             var cod=$('#id_t').val();
            //var parametros = $('#save_category').serialize(),
              $.ajax({
                 type: "PUT",
                 url: "/ed_tiend/"+cod,
                 data: $('#editar_tienda').serialize(),
                  beforeSend: function(response){

                   $('strong').html('');
                    $('#message_editar').css('display', 'block');
                    $('#message_editar').html("Cargando...");
                    $('#message_editar').addClass('alert alert-warning');
                   },
                 success: function(data)
                 {
                 $("#form_tienda")[0].reset();
                    $('#message_editar').css('display', 'block');
                    $('#message_editar').html(data.message);
                    $('#message_editar').removeClass();
                    $('#message_editar').addClass(data.class_name);
                    $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#message_editar').css('display', 'none');$('#modal-default-edit').modal('hide'); }, 3000);
                 cargar();
                 },
                 error: function(error){
                  var obj = error.responseJSON.errors;

                mostrarPropiedades(obj);

                function mostrarPropiedades(objeto) 
                  {
                      for (var i in objeto) 
                      {
                          var propiedad = ``;
                          var msg = ``;
                        if (objeto.hasOwnProperty(i)) 
                        {
                            propiedad = `${i}`;
                            msg = `${objeto[i]}`;
                            $("#ed_"+propiedad).html(msg);
                            $("#"+propiedad+"editar").addClass("is-invalid");

                        }
                      }
                  }
                 $('#message_editar').css('display', 'block');
                    $('#message_editar').html("Operacion Fallida...");
                    $('#message_editar').removeClass();
                    $('#message_editar').addClass('alert alert-danger');
                 $('#update').attr("disabled", true);
                 setTimeout(function(){ $('#message_editar').css('display', 'none') }, 3000);
                 }
             });
    }
   });

 $('#editar_tienda').validate({
   rules: {
     name: {
       required: true,
     },
     description: {
       required: true,
     },
   },
   messages: {
     name: {
       required: "Por favor ingrese un nombre",
     },
     description: {
       required: "Por favor ingrese una descripción",
     },
     },
   errorElement: 'span',
   errorPlacement: function (error, element) {
     error.addClass('invalid-feedback');
     element.closest('.form-group').append(error);
   },
   highlight: function (element, errorClass, validClass) {
     $(element).addClass('is-invalid');
   },
   unhighlight: function (element, errorClass, validClass) {
     $(element).removeClass('is-invalid');
   }
 });
});
</script>

       <!-- /.modal-dialog -->
