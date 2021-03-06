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
              <a href={{ URL::to('facturasg') }}>Factura sin guias</a>

              <span class="divider">
                <i class="icon-angle-right arrow-icon"></i>
              </span>
            </li>
            <li>Ver guia</li>
          </ul><!--.breadcrumb-->

          @stop
 
@section('contenido')
     
<div class="page-header position-relative">
            <h1>
              Crear Factura sin guia
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
    if ($factura->exists):
        $form_data = array('url' => 'facturasg/editar/'.$factura->id);
        $action    = 'Editar';
    else:
        $form_data = array('url' => 'facturasg/crear', 'target' =>'_blank');
        $action    = 'Crear';        
    endif;

?>


{{ Form::open($form_data) }}
       
          
            {{Form::label('Cliente', 'Cliente')}}
            {{Form::select('cliente_id',$clientes, $factura->cliente_id,array('class'=>'clientes'))}}

            {{Form::label('Producto', 'Producto')}}
            {{Form::select('producto_id',$productos, $factura->producto_id)}}

             {{Form::label('Tipo de pago')}}
            {{Form::select('tipopago',array("1"=>"Contado","2"=>"Credito"), $factura->tipopago)}}
            
            {{Form::label('Fecha')}}
            {{Form::text('fecha', $factura->fecha, array("class"=>"input-mask-date"))}}
            <small class="text-success">dd/mm/aaaa</small>

            {{Form::label('Descripcion')}}
            {{Form::text('descripcion', $factura->descripcion)}}

            {{Form::label('$ Precio')}}
            {{Form::text('precio', $factura->precio)}}
             <small class="text-success">Valor en $</small>


         
    
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
    
  });   
</script>

@stop


