<?php
class FacturaController extends BaseController {

public function mostrar(){

	$facturas = Factura::all();

	return View::make("factura.lista")->with("facturas",$facturas);

}

public function nuevo(){

	$guia = new Guia;
	$productos = Producto::all()->lists("nombre","id");


	$clientes = Cliente::all()->lists("nombre","id");
	
 $clientes = array("0" => "--Seleccione un cliente --") + $clientes;
	return View::make("factura.formulario")->with("guia",$guia)->with("productos",$productos)->with("clientes",$clientes);
	//return "ho";
}


public function nuevo2(){

	// $proyectos = Proyecto::create(Input::all());

	$data = Input::all();
	$factura = new Factura;
	//$guias = array(7,8,9);
	//print_r($data);





	
	if($factura->isValid($data))
	{
		$guias = $data["guias"];
		$factura->fill($data);
		$factura->save();
		$factura->guia()->attach($guias);
		
		$facturaid= $factura->id;
		$factura = Factura::find($facturaid);

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
	 $html =  View::make("factura.pdf")->with("factura",$factura);


       return PDF::load($html, 'A4', 'portrait')->show(); 
  

// Redirect::to("factura");


       


	}
	else
	{
		return Redirect::to("factura/nuevo")->withInput()->withErrors($factura->errors);
	}


	


	
}



public function editar($id){

	$guia = Guia::find($id);

	return View::make("factura.formulario")->with("guia",$guia);
}

public function editar2($id){


	$data = Input::all();
	$guia = Guia::find($id);


	if($guia->isValid($data))
	{
		$guia->fill($data);
		$guia->save();

		return Redirect::to("factura");
	}
	else
	{
		return Redirect::to("factura/nuevo")->withInput()->withErrors($guia->errors);
	}

}

public function eliminar()
{
		$id = Input::get('id'); //acedemos a la variable id traida por AJAX ($.get)
        $factura = Factura::find($id);

        $factura->delete();
        //return $id;
}

public function pdf($id)
{
	$factura = Factura::find($id);

	 $html =  View::make("factura.pdf")->with("factura",$factura);

      return PDF::load($html, 'A4', 'portrait')->show();

}



public function buscarguias()
{
    $id = Input::get("option");
    $guias = Guia::Where("cliente_id","=",$id)->whereNotExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('factura_guia')
                      ->whereRaw('factura_guia.guia_id = guia.id');
            })->select("id","cantidad","precio")->get();



   // Gastogeneral::
  // return json_encode($guias);
    return $guias;
}



}