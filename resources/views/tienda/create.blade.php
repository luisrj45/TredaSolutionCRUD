<div class="modal fade" id="modal-default-tienda" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Nueva Tienda</h4>
             <button type="button" class="btn btn-danger close" data-dismiss="modal" onclick="cargarInicio()" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form role="form" id="form_tienda" autocomplete="off">
                 {{ csrf_field() }}
                      <div class="form-group">
                          <div >
                              <span class="text-danger">* Campos obligatorios</span>
                          </div>
                        </div>
                      <div class="form-group">
                            <label for="id" class="control-label">ID<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="id" class="form-control" name="id" >

                                    <span class="text-danger ">
                                        <strong id="e_id" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="nombre" class="form-control" name="nombre" >

                                    <span class="text-danger ">
                                        <strong id="e_nombre" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="fecha" class="control-label">Fecha de Apertura (dd-mm-YYYY)<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="fecha" class="form-control" name="fecha" >

                                    <span class="text-danger ">
                                        <strong id="e_fecha" ></strong>
                                    </span>
                            </div>
                        </div>
                   </div>
                   <div class="modal-footer justify-content-between">
                       <button type="reset" class="btn btn-danger">Borrar</button>
                        <div class="" id="message" style="display: none"></div>
                       <button type="submit" class="btn btn-success float-right" id="register">Registrar</button>
                   </div>
           </form>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
<script type="text/javascript">
$(document).ready(function () {
 $.validator.setDefaults({
   submitHandler: function ()
   {
     $('#register').attr("disabled", true);
    //var parametros = $('#form_tienda').serialize(),
      $.ajax({
             type: "POST",
             url: "{{ route('crear_tienda') }}",
             data: $('#form_tienda').serialize(),
              beforeSend: function(response)
              {
                $('strong').html('');
                    $('#message').css('display', 'block');
                    $('#message').html("Cargando...");
                    $('#message').addClass('alert alert-warning');
               },
             success: function(data)
             {
                    $("#form_tienda")[0].reset();
                    $('#message').css('display', 'block');
                    $('#message').html("Operacion Exitosa");
                    $('#message').removeClass();
                    $('#message').addClass("alert alert-success");
                    $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#message').css('display', 'none') }, 5000);
              },
             error: function(error)
             {
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
                            $("#e_"+propiedad).html(msg);
                            $("#"+propiedad).addClass("is-invalid");

                        }
                      }
                  }

                 $('#message').css('display', 'block');
                    $('#message').html("Operacion Fallida...");
                    $('#message').removeClass();
                    $('#message').addClass('alert alert-danger');
                 $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#message').css('display', 'none') }, 5000);
               }
     });
    }
   });

     $('#form_tienda').validate({
       rules: {
         id: {
           required: true,
         },
         nombre: {
           required: true,
         },
         fecha: {
           required: true,
         },
       },
       messages: {
         id: {
           required: "Por favor ingrese un ID",
         },
         nombre: {
           required: "Por favor ingrese un nombre",
         },
         fecha: {
           required: "Por favor ingrese un Fecha de apertura",
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
