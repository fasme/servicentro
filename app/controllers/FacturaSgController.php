<?php
class FacturaSgController extends BaseController {

public function mostrar(){

	$facturas = Facturasg::all();

	return View::make("facturasg.lista")->with("facturas",$facturas);

}

public function nuevo(){

	$factura = new Facturasg;
	$productos = Producto::all()->lists("nombre","id");
	$clientes = Cliente::all()->lists("nombre","id");
	return View::make("facturasg.formulario")->with("factura",$factura)->with("productos",$productos)->with("clientes",$clientes);
	//return "ho";
}


public function nuevo2(){

	// $proyectos = Proyecto::create(Input::all());

	$data = Input::all();
	$factura = new Facturasg;

	$producto = Producto::find($data["producto_id"]);
	$data["valorbencina"] = $producto->precio;

	$data["cantidad"] = round($data["precio"]/$data["valorbencina"],3);

	$data["impuesto"] = $producto->impuesto;

	$data["variable"] = $producto->variable;





	if($factura->isValid($data))
	{
		list($dia,$mes,$ano) = explode("/",$data['fecha']);
            $data['fecha'] = "$ano-$mes-$dia";

		$factura->fill($data);
		$factura->save();
		$id= $factura->id;
		//return Redirect::to("guia");
		$factura = Facturasg::find($factura->id);

		


/*
    $pdf = new \Thujohn\Pdf\Pdf();
    $content = $pdf->load(View::make('guias.pdf')->with("guia",$guia))->output();
    File::put('test/'.$guia->id.'.pdf', $content);

PDF::clear();

$path1 = '"C:\Archivos de programa\Adobe\Reader 11.0\Reader\AcroRd32.exe"';
		$path2 = " D:/xampp/htdocs/servicentro/public/test/".$id.".pdf";
		
		$path = $path1.' /t '.$path2;
        exec($path);

*/

	 $html =  View::make("facturasg.pdf")->with("factura",$factura);


       return PDF::load($html, 'A4', 'portrait')->show(); 
  

 Redirect::to("facturasg");

	
		

		
		//return exec("whoami");
       


	}
	else
	{
		return Redirect::to("facturasg/nuevo")->withInput()->withErrors($guia->errors);
	}


	


	
}



public function editar($id){

	$guia = Guia::find($id);
	$clientes = Cliente::all()->lists("nombre","id");
	$productos = Producto::all()->lists("nombre","id");

	return View::make("guias.formulario")->with("guia",$guia)->with("clientes",$clientes)->with("productos",$productos);
}

public function editar2($id){


	$data = Input::all();
	$guia = Guia::find($id);


	if($guia->isValid($data))
	{
		$guia->fill($data);
		$guia->save();

		return Redirect::to("guia");
	}
	else
	{
		return Redirect::to("guia/nuevo")->withInput()->withErrors($guia->errors);
	}

}

public function eliminar()
{
		$id = Input::get('id'); //acedemos a la variable id traida por AJAX ($.get)
        $guia = Guia::find($id);

        $guia->delete();
        //return $id;
}

public function pdf($id)
{
	$factura = Facturasg::find($id);

	 $html =  View::make("facturasg.pdf")->with("factura",$factura);

      return PDF::load($html, 'A4', 'portrait')->show();

}



}