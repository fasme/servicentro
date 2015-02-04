@extends('layouts.master')
 


@section('breadcrumb')
<ul class="breadcrumb">
            <li>
              <i class="fa fa-home home-fa fa"></i>
              <a href="#">Home</a>

              <span class="divider">
                <i class="fa fa-angle-right arrow-fa fa"></i>
              </span>
            </li>

            <li>
              <a href={{ URL::to('producto') }}>Producto</a>

              <span class="divider">
                <i class="fa fa-angle-right arrow-fa fa"></i>
              </span>
            </li>
            <li>Ver Productos</li>
          </ul><!--.breadcrumb-->

          @stop

@section('contenido')





        <h1>
  Productos

</h1>

        
 
<table id="example" class="table table-striped table-bordered table-hover">
  <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
  <th>Acciones</th>
            
          </tr>
        </thead>
        <tbody>


  @foreach($productos as $producto)
           <tr>

             <td> {{ $producto->nombre}}</td>
            <td> {{  $producto->precio }} </td>


  <td class="td-actions">
                       
                      

                          <a class="green" href= {{ 'producto/editar/'.$producto->id }}>
                            <i class="fa fa-pencil bigger-130"></i>
                          </a>

                         <a class="red bootbox-confirm" data-id={{ $producto->id }}>
                            <i class="fa fa-trash bigger-130"></i>
                          </a>
                      </td>
</tr>
          @endforeach
        </tbody>
  </table>


  <script type="text/javascript">
 $(document).ready(function() {


$('#example').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools: {
            "sSwfPath": "js/TableTools/swf/copy_csv_xls_pdf.swf"
        }
    } );


$( "#productoactive" ).addClass( "active" );




$(".bootbox-confirm").on(ace.click_event, function() {
  var id = $(this).data('id');
var tr = $(this).parents('tr'); 

          bootbox.confirm("Deseas Eliminar el registro "+id, function(result) {
            if(result) { // si se seleccion OK
              
           
             
             $.get("{{ url('producto/eliminar')}}",
              { id: id },

              function(data,status){ tr.fadeOut(1000); }
).fail(function(data){bootbox.alert("No se puede eliminar un registro padre: una restricción de clave externa falla");});

     
            }
           
          });
        });





}); // fin ready
 </script>




        

        


@stop

