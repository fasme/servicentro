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
$mes=date("F");

if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
?>

<div style="position: absolute;top: 120px; left: 50px;">{{ date("d")}} </div>
<div style="position: absolute;top: 120px; left: 150px;">{{ $mes}} </div>
<div style="position: absolute;top: 120px; left: 250px;">{{ date("Y")}} </div>

<div style="position: absolute;top: 150px; left: 50px;">{{$guia->cliente->nombre}}</div>
<div style="position: absolute;top: 180px; left: 50px;">{{$guia->cliente->direccion}}</div>
<div style="position: absolute;top: 210px; left: 50px;">{{$guia->cliente->giro}}</div>


<div style="position: absolute;top: 180px; left: 300px;">{{$guia->cliente->comuna}}</div>


<div style="position: absolute;top: 180px; left: 500 px;">{{$guia->cliente->rut}}</div>
<div style="position: absolute;top: 210px; left: 500 px;">{{$guia->cliente->ciudad}}</div>
<div style="position: absolute;top: 240px; left: 500 px;">{{$guia->cliente->telefono}}</div>



<div style="position: absolute;top: 400px; left: 50px;">{{$guia->cantidad." Lts"}}</div>
<div style="position: absolute;top: 400px; left: 200px;">{{$guia->descripcion}}</div>
<div style="position: absolute;top: 400px; left: 500 px;">{{$guia->valorbencina}}</div>
<div style="position: absolute;top: 400px; left: 600px;">{{$guia->precio}}</div>
</html>