@extends ('layouts.menu')
@section ('contenido')
<div class="card col-lg-12">
      <div class="card-header">
                <h3 class="card-title">
                  Mysql
                </h3>
        </div><!-- /.card-header -->
   <!-- /.card-header -->
        <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  	<div class="chart tab-pane active" id="revenue-chart">
                      <div class="col-12">
                        <div class="card">
						              <div class="card-body table-responsive p-0" style="min-height: 200px;">
                            <h3>reporte 1</h3>
						                <span>select c.id as cedula,CONCAT(c.primer_nombre," ",c.primer_apellido) as nombre, dias_mora as diasEnMora,
                            IF (c.dias_mora>0 AND c.dias_mora<=20,'Riesgo Bajo',
                            IF(c.dias_mora>=20 AND c.dias_mora<=35, 'Riesgo Medio', 
                            IF (c.dias_mora>35,'Riesgo alto',''))) as riesgo, ciu.nombre as ciudad from cliente as c INNER JOIN ciudad as ciu on c.id_ciudad=ciu.id
                            order by (c.dias_mora) asc</span>
                            <h3>reporte 2</h3>
                            <span>select s.nombre as sucursal, TRUNCATE((c.valor_poliza_iva_incl+c.valor_poliza+c.valor_poliza_cuota),0) as valorTotalPagado from cotizacion as c INNER JOIN  sucursal as s ON c.id_sucursal=s.id GROUP BY s.nombre ORDER BY valorTotalPagado asc</span>
                            <h3>reporte 3</h3>
                            <span>select p.cc as CC, p.nombre as Nombre, e.institucion as Institucion, max(e.fecha) as Fecha from estudios as e INNER JOIN persona as p ON p.cc=e.fkpersona AND e.fecha=(select max(fecha) from estudios where fkpersona=p.cc  group by fkpersona) GROUP BY p.cc</span>
                            <h3>reporte 4</h3>
                            <span>select e.cc as CC, e.nombre, e.cargo, e.area as área, j.nombre as 'Nombre Jefe' from empleados as e INNER JOIN  jefes as j ON e.id_jefe=j.id</span>
                        </div>
                        <br>
                            
	                </div>

                  </div>
                  </div>
                   	
                </div>
        </div><!-- /.card-body -->
</div>
        <script type="text/javascript">
            function cargar(){
              location.reload();
            }
             
            function cargarInicio(){
              location.replace("/tiendas")();
            }
        </script>
          
@endsection
