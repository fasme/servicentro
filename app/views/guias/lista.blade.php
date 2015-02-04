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
            <li>Ver Guias</li>
          </ul><!--.breadcrumb-->

          @stop

@section('contenido')





        <h1>
  Guias de despacho

</h1>

        
 
<table id="example" class="table table-striped table-bordered table-hover">
  <thead>
          <tr>
            <th>Producto</th>
            <th>Cliente</th>
            <th>Descripcion</th>
            <th>Cantidad (lts)</th>
           
            <th>$ precio</th>
             <th>Valor producto (al dia)</th>
  <th>Acciones</th>
            
          </tr>
        </thead>
        <tbody>


  @foreach($guias as $guia)
           <tr>

             <td> {{ $guia->producto->nombre}}</td>
            <td> {{  $guia->cliente->nombre }} </td>
             <td> {{  $guia->descripcion }} </td>
            <td> {{ $guia->cantidad}}</td>
           
            <td> {{ $guia->precio}}</td>
            <td> {{ $guia->valorbencina}}</td>
         


  <td class="td-actions">
                       
                      

                          <a class="green" href= {{ 'guia/editar/'.$guia->id }}>
                            <i class="fa fa-pencil bigger-130"></i>
                          </a>

                         <a class="red bootbox-confirm" data-id={{ $guia->id }}>
                            <i class="fa fa-trash bigger-130"></i>
                          </a>

                          <a class="blue" href= {{ 'guia/pdf/'.$guia->id }}>
                            <i class="fa fa-file-pdf-o bigger-130"></i>
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


$( "#guiaactive" ).addClass( "active" );




$(".bootbox-confirm").on(ace.click_event, function() {
  var id = $(this).data('id');
var tr = $(this).parents('tr'); 

          bootbox.confirm("Deseas Eliminar el registro "+id, function(result) {
            if(result) { // si se seleccion OK
              
           
             
             $.get("{{ url('guia/eliminar')}}",
              { id: id },

              function(data,status){ tr.fadeOut(1000); }
).fail(function(data){bootbox.alert("No se puede eliminar un registro padre: una restricción de clave externa falla");});

     
            }
           
          });
        });





}); // fin ready
 </script>




        

        


@stop

