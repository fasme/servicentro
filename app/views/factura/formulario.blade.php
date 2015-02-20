@extends('layouts.master')
 
@section('breadcrumb')
<ul class="breadcrumb">
            <li>
              <i class="icon-home home-icon"></i>
              <a href="#">Home</a>

              <span class="divider">
                <i class="icon-angle-right arrow-icon"></i>
              </span>
            </li>

            <li>
              <a href={{ URL::to('factura') }}>facturas</a>

              <span class="divider">
                <i class="icon-angle-right arrow-icon"></i>
              </span>
            </li>
            <li>Ver factura</li>
          </ul><!--.breadcrumb-->

          @stop
 
@section('contenido')
     
<div class="page-header position-relative">
            <h1>
              Crear Factura
              <small>
                <i class="icon-double-angle-right"></i>
                
              </small>
            </h1>
          </div><!--/.page-header-->


     @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif


<div class="row-fluid">
  <div class="span4">

           <?php
  // si existe el usuario carga los datos
    if ($guia->exists):
        $form_data = array('url' => 'factura/editar/'.$guia->id);
        $action    = 'Editar';
    else:
        $form_data = array('url' => 'factura/crear', 'target' =>'_blank');
        $action    = 'Crear';        
    endif;

?>


{{ Form::open($form_data) }}
       
          
            {{Form::label('Cliente', 'Cliente')}}
            {{Form::select('cliente_id',$clientes, $guia->cliente_id,array('class'=>'clientes', "id"=>"clientes"))}}
            <br><br><br>
            <small>Guias Pendientes</small>
            <div id="mostarguias">

            </div>
           

            


         
    
<br>
             {{Form::submit('Guardar', array('class'=>'btn btn-small btn-success'))}}
        {{ Form::close() }}



    

  
</div>

   </div><!--/row-->



<script>
  $(document).ready(function(){
   

$('.input-mask-date').mask('99/99/9999');
$('.input-mask-date2').mask('99/99/9999');


$( "#facturaactive" ).addClass( "active" );
$(".clientes").chosen(); 


$("#clientes").change(function(){
$("#mostarguias").empty();
$.get("{{ url('factura/buscarguias')}}",
      { option: $(this).val() },
      function (data){ 
  

      if(data == ""){
        $("#mostarguias").append("<small class='text-error'>No hay guias pendientes para este cliente</small>");
        
      }

        $.each(data, function(key, element) {

        
          $("#mostarguias").append("<li><input type='hidden' name='guiavalue' value='1'><input type='hidden' name='guias[]' value='"+element.id+"'>Guia: "+element.id + " Total Guia: "+element.precio + "</li>");
        });



      }
      );
      
});
    
  });   
</script>

@stop


