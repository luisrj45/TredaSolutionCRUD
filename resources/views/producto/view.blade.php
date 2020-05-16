<div class="modal fade" id="view" role="dialog" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Ver Producto</h4>
             <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form autocomplete="off">

                  <div class="form-group">
                            <label for="sku" class="control-label">SKU</label>

                            <div >
                                <input  type="text" disabled="true" id="sku_ver" class="form-control" name="sku" >
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre</label>

                            <div >
                                <input  type="text" disabled="true" id="nombre_ver" class="form-control" name="nombre" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="control-label">Descripción</label>

                            <div >
                                <textarea disabled="true" id="descripcion_ver" name="descripcion" class="form-control"  rows="3"  style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor" class="control-label">Valor</label>

                            <div>
                                <input  type="text" disabled="true" id="valor_ver" class="form-control" name="valor" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tienda" class="control-label">Tienda</label>

                            <div>
                                <select data-live-search="true"  tabindex="-98" disabled="true" id="tienda_ver" name="tienda" class="form-control selectpicker">
                                      <option value="0" disabled="true" selected="true">Seleccione una Tienda</option>

                                    @foreach ($tienda as $tiend)
                                      @if($tiend->deleted_at===null)
                                        <option value="{{ $tiend->id_tienda }}">{{ $tiend->nombre }}</option>
                                      @endif
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tienda" class="control-label">Foto</label>
                            <br>
                            <div >
                                <img src="" class="mx-auto d-block img-thumbnail" id="imagen_ver" alt="" width="40%" height="40%">
                            </div>
                        </div>
           </form>
         </div>
         <!-- /.modal-content -->
       </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function ()
    {
        $('.view').on('click',function(e)
          {
                $('#view').modal('show');
                 $('.table tbody tr').click(function(e)
                 {
                   var cod = $(this).find('input[type="hidden"]').val();
                 var app = @json($productos);
                 let valores = app.data.filter(valor=>valor.id_producto == cod)
                      $("#sku_ver").val(valores[0].sku);
                      $("#nombre_ver").val(valores[0].producto_nombre);
                      $("#descripcion_ver").val(valores[0].descripcion);
                      $("#valor_ver").val(valores[0].valor);
                      $("#tienda_ver").val(valores[0].tienda);
                      $("#imagen_ver").attr("src",valores[0].imagen);

                 });
             e.preventDefault();

           });
    });
</script>

       <!-- /.modal-dialog -->
