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
<title>Factura </title>
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

<div style="position: absolute;top: 140px; left: 50px;">{{ date("d")}} </div>
<div style="position: absolute;top: 140px; left: 150px;">{{ $mes}} </div>
<div style="position: absolute;top: 140px; left: 270px;">{{ date("Y")}} </div>

<div style="position: absolute;top: 155px; left: 50px;">{{$factura->cliente->nombre}}</div>
<div style="position: absolute;top: 180px; left: 50px;">{{$factura->cliente->direccion}}</div>
<div style="position: absolute;top: 200px; left: 50px;">{{$factura->cliente->giro}}</div>


<div style="position: absolute;top: 180px; left: 310px;">{{$factura->cliente->comuna}}</div>


<div style="position: absolute;top: 180px; left: 550 px;">{{$factura->cliente->rut}}</div>
<div style="position: absolute;top: 200px; left: 550 px;">{{$factura->cliente->ciudad}}</div>
<div style="position: absolute;top: 220px; left: 550 px;">{{$factura->cliente->telefono}}</div>

<?php $suma =0; ?>
<?php $neto =0; ?>
            <?php $sumaneto =0; ?>
            <?php $impuestoespecifico =0; ?>
            <?php $sumaimpuestoespecifico =0; ?>
            <?php $iva =0; ?>
            <?php $sumaiva =0; ?>

<div style="position: absolute;top: 300px; left: 20px;">{{$factura->cantidad." "}}</div>
<div style="position: absolute;top: 300px; left: 200px;">@foreach ($factura->guia as $guia)
             
             <?php $suma += $guia->precio; ?>

                    <?php
              $impuestoespecifico = $guia->cantidad*$guia->impuesto;
$neto = ($guia->precio - $impuestoespecifico) / 1.19;
$iva = $neto *0.19;

$sumaimpuestoespecifico += $impuestoespecifico; 
$sumaneto += $neto; 
$sumaiva += $iva; 
?>


            @endforeach</div>
<div style="position: absolute;top: 300px; left: 600 px;">{{$factura->valorbencina}}</div>

<div style="position: absolute;top: 320px; left: 700px;">{{ round($sumaimpuestoespecifico) }}</div>
<div style="position: absolute;top: 340px; left: 700px;">{{ round($sumaneto) }}</div>
<div style="position: absolute;top: 360px; left: 700px;">{{ round($sumaiva) }}</div>
<div style="position: absolute;top: 380px; left: 700px;">{{ $suma }}</div>
</html>