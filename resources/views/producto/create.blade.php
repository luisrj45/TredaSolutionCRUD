<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="modal fade" id="modal-default-producto" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Nuevo producto</h4>
             <button type="button" class="btn btn-danger close" data-dismiss="modal" onclick="cargarInicio()" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form  id="form_producto"  autocomplete="off"  enctype="multipart/form-data">
                 {{ csrf_field() }}
                      <div class="form-group">
                          <div >
                              <span class="text-danger">* Campos obligatorios</span>
                          </div>
                        </div>
                      <div class="form-group">
                            <label for="sku" class="control-label">SKU<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="sku" class="form-control" name="sku" >

                                    <span class="text-danger ">
                                        <strong id="e_sku" ></strong>
                                    </span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre<span class="text-danger">*</span></label>

                            <div >
                                <input  type="text" id="nombrep" class="form-control" name="nombre" >

                                    <span class="text-danger ">
                                        <strong id="e_nombre" ></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción<span class="text-danger">*</span></label>

                            <div >
                                <textarea id="descripcionp" name="descripcion" class="form-control"  rows="3"  style="resize: none;"></textarea>
                                    <span class="text-danger">
                                        <strong id="e_descripcion"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor" class="control-label">Valor<span class="text-danger">*</span></label>

                            <div>
                                <input  type="text" id="valor" class="form-control" name="valor" >

                                    <span class="text-danger ">
                                        <strong id="e_valor" ></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tienda" class="control-label">Tienda<span class="text-danger">*</span></label>

                            <div>
                                <select data-live-search="true"  tabindex="-98" id="tienda" name="tienda" class="form-control selectpicker">
                                      <option value="0" disabled="true" selected="true">Seleccione una Tienda</option>

                                    @foreach ($tienda as $tiend)
                                      @if($tiend->deleted_at===null)
                                        <option value="{{ $tiend->id_tienda }}">{{ $tiend->nombre }}</option>
                                      @endif
                                    @endforeach
                                    </select>
                                    <span class="text-danger">
                                        <strong id="e_tienda"></strong>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">Imagen<span class="text-danger">*</span></label></td>
                           <div>
                               <input type="file" name="imagen" id="imagen" />
                               <br>
                                    <span class="text-danger ">
                                      <strong id="e_imagen" ></strong>
                                    </span>
                            </div>
                        </div>
                         
                   <div class="modal-footer justify-content-between">
                       <button type="reset" class="btn btn-danger">Borrar</button>
                        <div class="" id="msgproducto" style="display: none"></div>
                       <button type="submit" class="btn btn-success float-right" id="register">Registrar</button>
                   </div>
           </form>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
 </div> 
<script type="text/javascript">
$(document).ready(function () {
 $.validator.setDefaults({
   submitHandler: function ()
   {
    // $('#register').attr("disabled", true);
    //var parametros = $('#form_producto').serialize(),
  $('#form_producto').on('submit', function(event){
  event.preventDefault();
      $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              url:"{{ route('crear_producto') }}",
              method:"POST",
             data:new FormData(this),
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
              beforeSend: function (xhr) { // Add this line
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                $('strong').html('');
                    $('#msgproducto').css('display', 'block');
                    $('#msgproducto').html("Cargando...");
                    $('#msgproducto').addClass('alert alert-warning');
               },
             success: function(data)
             {
                    $("#form_producto")[0].reset();
                    $('#msgproducto').css('display', 'block');
                    $('#msgproducto').html("Operacion Exitosa");
                    $('#msgproducto').removeClass();
                    $('#msgproducto').addClass("alert alert-success");
                    $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#msgproducto').css('display', 'none') }, 5000);
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

                 $('#msgproducto').css('display', 'block');
                    $('#msgproducto').html("Operacion Fallida...");
                    $('#msgproducto').removeClass();
                    $('#msgproducto').addClass('alert alert-danger');
                 $('#register').attr("disabled", false);
                 setTimeout(function(){ $('#msgproducto').css('display', 'none') }, 5000);
               }
     });
     });
}
     });
    
     $('#form_producto').validate({
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
