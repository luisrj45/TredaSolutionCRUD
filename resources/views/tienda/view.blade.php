<div class="modal fade" id="view" role="dialog" data-keyboard="true" data-backdrop="static">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Ver Tienda</h4>
             <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form autocomplete="off">

                       <div class="form-group ">
                            <label for="id" class="control-label">ID</label>

                            <div >
                                <input  type="text" disabled="true"  id="idver" class="form-control" >
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="nombre" class="control-label">Nombre</label>

                            <div >
                                <input  type="text" disabled="true" id="nombrever" class="form-control" >
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="fecha" class="control-label">Fecha de Apertura</label>

                            <div >
                                <input  type="text" disabled="true" id="fechaver" class="form-control" >
                            </div>
                        </div>

                   </div>
           </form>
         </div>
         <!-- /.modal-content -->
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
                   var app = @json($tiendas);
                   let valores = app.data.filter(valor=>valor.id_tienda == cod)
                      $("#idver").val(valores[0].id);
                      $("#nombrever").val(valores[0].nombre);
                      $("#fechaver").val(valores[0].fecha_apertura);

                 });
             e.preventDefault();

           });
    });
</script>

       <!-- /.modal-dialog -->
