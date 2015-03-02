<style>

.oli{
	
border: 1px solid black;
	 
}

table, th, td{

	
}


.letrachica { 
  font: 70% arial; 
}
}
</style>

<html>
<title>Guia de despacho </title>
<?php
$fecha = $guia->fecha;

list($ano,$mes,$dia) = explode("-",$fecha);


if ($mes=="01") $mes="Enero";
if ($mes=="02") $mes="Febrero";
if ($mes=="03") $mes="Marzo";
if ($mes=="04") $mes="Abril";
if ($mes=="05") $mes="Mayo";
if ($mes=="06") $mes="Junio";
if ($mes=="07") $mes="Julio";
if ($mes=="08") $mes="Agosto";
if ($mes=="09") $mes="Setiembre";
if ($mes=="10") $mes="Octubre";
if ($mes=="11") $mes="Noviembre";
if ($mes=="12") $mes="Diciembre";


$impuestoespecifico = round($guia->cantidad*$guia->impuesto);
$variable = round($guia->cantidad*$guia->variable);
$neto = round(($guia->precio - $impuestoespecifico - $variable) / 1.19);
$iva = round($neto *0.19);
?>

<div style="position: absolute;top: 140px; left: 50px;">{{ $dia}} </div>
<div style="position: absolute;top: 140px; left: 150px;">{{ $mes}} </div>
<div style="position: absolute;top: 140px; left: 300px;">{{ $ano}} </div>

<div style="position: absolute;top: 155px; left: 50px;">{{$guia->cliente->nombre}}</div>
<div style="position: absolute;top: 180px; left: 50px;">{{$guia->cliente->direccion}}</div>
<div style="position: absolute;top: 200px; left: 50px;">{{$guia->cliente->giro}}</div>


<div style="position: absolute;top: 180px; left: 310px;">{{$guia->cliente->comuna}}</div>


<div style="position: absolute;top: 180px; left: 600 px;">{{$guia->cliente->rut}}</div>
<div style="position: absolute;top: 200px; left: 600 px;">{{$guia->cliente->ciudad}}</div>
<div style="position: absolute;top: 220px; left: 600 px;">{{$guia->cliente->telefono}}</div>



<div style="position: absolute;top: 300px; left: 20px;">{{$guia->cantidad." Lts"}}</div>
<div style="position: absolute;top: 300px; left: 200px;">{{$guia->descripcion}}</div>
<div style="position: absolute;top: 300px; left: 600 px;">{{$guia->valorbencina}}</div>
<div style="position: absolute;top: 300px; left: 700px;">{{$guia->precio}}</div>
</html>