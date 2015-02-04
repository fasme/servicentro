<?php
class GuiaController extends BaseController {

public function mostrar(){

	$guias = Guia::all();

	return View::make("guias.lista")->with("guias",$guias);

}

public function nuevo(){

	$guia = new Guia;
	$productos = Producto::all()->lists("nombre","id");
	$clientes = Cliente::all()->lists("nombre","id");
	return View::make("guias.formulario")->with("guia",$guia)->with("productos",$productos)->with("clientes",$clientes);
	//return "ho";
}


public function nuevo2(){

	// $proyectos = Proyecto::create(Input::all());

	$data = Input::all();
	$guia = new Guia;

	$producto = Producto::find($data["producto_id"]);
	$data["valorbencina"] = $producto->precio;

	$data["cantidad"] = round($data["precio"]/$data["valorbencina"],3);



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



public function editar($id){

	$guia = Guia::find($id);

	return View::make("guias.formulario")->with("guia",$guia);
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
	$guia = Guia::find($id);

	 $html =  View::make("guias.pdf")->with("guia",$guia);

      return PDF::load($html, 'A4', 'portrait')->show();

}



}