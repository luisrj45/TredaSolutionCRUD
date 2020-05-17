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
               <form  id="form_producto_editar"  autocomplete="off"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <input type="hidden" id="id_prod">
                      <div class="form-group">
                          <div >
                              <span class="text-danger">* Campos obligatorios</span>
                          </div>
                        </div>
                      <div class="form-group">
                            <label for="sku" class="control-label">SKU<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="sku_editar" class="form-control" name="sku" >

                                    <span class="text-danger ">
                                        <strong id="ed_sku" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="nombre_editar" class="form-control" name="nombre" >

                                    <span class="text-danger ">
                                        <strong id="ed_nombre" ></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción<span class="text-danger">*</span></label>

                            <div >
                                <textarea id="descripcion_editar" name="descripcion" class="form-control"  rows="3"  style="resize: none;"></textarea>
                                    <span class="text-danger">
                                        <strong id="ed_descripcion"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor" class="control-label">Valor<span class="text-danger">*</span></label>

                            <div>
                                <input  type="text" id="valor_editar" class="form-control" name="valor" >

                                    <span class="text-danger ">
                                        <strong id="ed_valor" ></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tienda" class="control-label">Tienda<span class="text-danger">*</span></label>

                            <div>
                                <select data-live-search="true"  tabindex="-98" id="tienda_editar" name="tienda" class="form-control selectpicker">
                                      <option value="0" disabled="true" selected="true">Seleccione una Tienda</option>

                                    @foreach ($tienda as $tiend)
                                      @if($tiend->deleted_at===null)
                                        <option value="{{ $tiend->id_tienda }}">{{ $tiend->nombre }}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                    <span class="text-danger">
                                        <strong id="ed_tienda"></strong>
                                    </span>
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
                 var app = @json($productos);
                 let valores = app.data.filter(valor=>valor.id_producto == cod)
                      $("#id_prod").val(valores[0].id_producto);
                      $("#sku_editar").val(valores[0].sku);
                      $("#nombre_editar").val(valores[0].producto_nombre);
                      $("#descripcion_editar").val(valores[0].descripcion);
                      $("#valor_editar").val(valores[0].valor);
                      $("#tienda_editar").val(valores[0].tienda);


                    e.preventDefault();
               });
           });
 $.validator.setDefaults({
   submitHandler: function ()
   {
     //$('#update').attr("disabled", true);
             var cod=$('#id_prod').val();
            //var parametros = $('#save_category').serialize(),
              $.ajax({
                type: "PUT",
                 url: "/ed_product/"+cod,
                 data: $('#form_producto_editar').serialize(),
            beforeSend: function(response){

                   $('strong').html('');
                    $('#message_editar').css('display', 'block');
                    $('#message_editar').html("Cargando...");
                    $('#message_editar').addClass('alert alert-warning');
                   },
                 success: function(data)
                 {
                    $('#message_editar').css('display', 'block');
                    $('#message_editar').html("Operacion Exitosa");
                    $('#message_editar').removeClass();
                    $('#message_editar').addClass("alert alert-success");
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
                 setTimeout(function(){ $('#message_editar').css('display', 'none') }, 3000);
                 }
             });
    }
   });

 $('#form_producto_editar').validate({
   rules: {
         sku: {
           required: true,
         },
         nombre: {
           required: true,
         },
         descripcion: {
           required: true,
         },
         valor: {
           required: true,
         },
         tienda: {
           required: true,
           min:1,
         },
       },
       messages: {
         sku: {
           required: "Por favor ingrese un SKU",
         },
         nombre: {
           required: "Por favor ingrese un nombre",
         },
         descripcion: {
           required: "Por favor ingrese una descripción",
         },
         valor: {
           required: "Por favor ingrese un valor",
         },
         tienda: {
           required: "Por favor seleccione una tienda",
           min: "Por favor ingrese una tienda",
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
