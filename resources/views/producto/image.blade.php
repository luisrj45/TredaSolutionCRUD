<div class="modal fade" id="modal-photo" role="dialog" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Editar Imagen producto</h4>
             <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
          <div class="alert" id="message" style="display: none"></div>

             <form method="post" id="upload_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                        <input id="ima" type="hidden" class="form-control" name="id">
                <div class="form-group">
                   <label>Seleccione una imagen</label></td>
                   <input type="file" name="imagen" id="select_file_art" />
                   <br>
                          <span class="text-danger ">
                              <strong id="err_imagen" ></strong>
                          </span>
                </div>
                <div class="modal-footer justify-content-between">
                      <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <div id="Cargando_img"></div>
                       <button id="registrar_imagen" type="submit" class="btn btn-success float-right">Guardar</button>
                   </div>
               </form>
               <div class="mx-auto d-block " id="uploaded_image_art"></div>
         </div>
         <!-- /.modal-content -->
       </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('.foto').on('click',function(){
             $('#modal-photo').modal('show');
               $('.table tbody tr').click(function(e)
               {
                  $('#upload_form')[0].reset();
                  $('#message').css('display', 'none');
                  $('#message').html('');
                  $("#upload_form")[0].reset();
                 var cod = $(this).find('input[type="hidden"]').val();
                   var app = @json($productos);
                   let valores = app.data.filter(valor=>valor.id_producto == cod)
                      $("#ima").val(valores[0].id_producto);
                      if (valores[0].imagen != null && valores[0].imagen != "" ) {
                        $("#uploaded_image_art").html('<img class="mx-auto d-block" src="'+valores[0].imagen+'" class="img-thumbnail" width="300" />');
                      }else{
                         $("#uploaded_image_art").html('<h3>No tiene imagen</h3>');
                      }
                    e.preventDefault();
               });
           });
 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('imagen_producto') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   beforeSend: function(response){
                  $('strong').html('');
                   $("#Cargando_img").html('<div class="spinner-border text-success" role="status"><span class="sr-only">Actualizando...</span></div>');
                   //console.log(response);
                   },
                   success:function(data)
                   {
                  $('#upload_form')[0].reset();

                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('#uploaded_image_art').html(data.uploaded_image);
                     $("#Cargando_img").html('');
                     setTimeout(function(){  window.location.reload() }, 5000);
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
                            $("#err_"+propiedad).html(msg);
                            $("#"+propiedad).addClass("is-invalid");

                        }
                      }
                  }

                 $('#message').css('display', 'block');
                    $('#message').html("Operacion Fallida...");
                    $('#message').removeClass();
                    $('#message').addClass('alert alert-danger');
                 $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#message').css('display', 'none'); window.location.reload();}, 5000);
               }
  })
 });

});
</script>