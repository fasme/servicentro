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
              <a href={{ URL::to('producto') }}>Productos</a>

              <span class="divider">
                <i class="icon-angle-right arrow-icon"></i>
              </span>
            </li>
            <li>Ver Producto</li>
          </ul><!--.breadcrumb-->

          @stop
 
@section('contenido')
     
<div class="page-header position-relative">
            <h1>
              Crear Producto
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
    if ($producto->exists):
        $form_data = array('url' => 'producto/editar/'.$producto->id);
        $action    = 'Editar';
    else:
        $form_data = array('url' => 'producto/crear');
        $action    = 'Crear';        
    endif;

?>


{{ Form::open($form_data) }}
       
          
            {{Form::label('Nombre', 'Nombre')}}
            {{Form::text('nombre', $producto->nombre)}}

            {{Form::label('Precio', 'precio')}}
            {{Form::text('precio', $producto->precio)}}

            {{Form::label('Impuesto Especifico')}}
            {{Form::text('impuesto', $producto->impuesto)}}

            {{Form::label('Variable')}}
            {{Form::text('variable', $producto->variable)}}
         
    

             {{Form::submit('Guardar', array('class'=>'btn btn-small btn-success'))}}
        {{ Form::close() }}



    

  
</div>

   </div><!--/row-->



<script>
  $(document).ready(function(){
   

$('.input-mask-date').mask('99/99/9999');
$('.input-mask-date2').mask('99/99/9999');


$( "#productoactive" ).addClass( "active" );
    
  });   
</script>

@stop


