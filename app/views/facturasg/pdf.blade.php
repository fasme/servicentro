<style>

BODY { font-family:arial;

 }

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
<title>Factura </title>
<?php
$fecha = $factura->fecha;

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



$impuestoespecifico = round($factura->cantidad*$factura->impuesto);
$variable = round($factura->cantidad*$factura->variable);
$neto = round(($factura->precio - $impuestoespecifico - $variable) / 1.19);
$iva = round($neto *0.19);
?>

<div style="position: absolute;top: 140px; left: 50px;">{{ $dia}} </div>
<div style="position: absolute;top: 140px; left: 150px;">{{ $mes}} </div>
<div style="position: absolute;top: 140px; left: 300px;">{{ $ano}} </div>

<div style="position: absolute;top: 155px; left: 50px;">{{$factura->cliente->nombre}}</div>
<div style="position: absolute;top: 180px; left: 50px;">{{$factura->cliente->direccion}}</div>
<div style="position: absolute;top: 200px; left: 50px;">{{$factura->cliente->giro}}</div>


<div style="position: absolute;top: 180px; left: 310px;">{{$factura->cliente->comuna}}</div>


<div style="position: absolute;top: 180px; left: 600 px;">{{$factura->cliente->rut}}</div>
<div style="position: absolute;top: 200px; left: 600 px;">{{$factura->cliente->ciudad}}</div>
<div style="position: absolute;top: 220px; left: 600 px;">{{$factura->cliente->telefono}}</div>



<div style="position: absolute;top: 300px; left: 20px;">{{$factura->producto->nombre}}</div>
<div style="position: absolute;top: 300px; left: 150px;">{{$factura->cantidad}}</div>
<div style="position: absolute;top: 300px; left: 250px;">{{$factura->valorbencina}}</div>
<div style="position: absolute;top: 300px; left: 300px;">{{$neto}}</div>
<div style="position: absolute;top: 300px; left: 450px;">{{$iva}}</div>
<div style="position: absolute;top: 300px; left: 500px;">{{$variable}}</div>
<div style="position: absolute;top: 300px; left: 550px;">{{$impuestoespecifico}}</div>
<div style="position: absolute;top: 300px; left: 600px;">{{$factura->precio}}</div>


<div style="position: absolute;top: 500px; left: 500px;">{{"NETO"}}</div>
<div style="position: absolute;top: 500px; left: 600px;">{{$neto}}</div>
<div style="position: absolute;top: 520px; left: 500px;">{{"IVA"}}</div>
<div style="position: absolute;top: 520px; left: 600px;">{{$iva}}</div>
<div style="position: absolute;top: 540px; left: 500px;">{{"Imp esp"}}</div>
<div style="position: absolute;top: 540px; left: 600px; ">{{$impuestoespecifico}}</div>
<div style="position: absolute;top: 560px; left: 500px;">{{"Imp Var"}}</div>
<div style="position: absolute;top: 560px; left: 600px; ">{{$variable}}</div>

<div style="position: absolute;top: 580px; left: 500px;">{{"Total"}}</div>
<div style="position: absolute;top: 580px; left: 600px; ">{{$factura->precio}}</div>

</html>