<?php
class ProductoController extends BaseController {

public function mostrar(){

	$productos = Producto::all();

	return View::make("productos.lista")->with("productos",$productos);

}

public function nuevo(){

	$producto = new Producto;

	return View::make("productos.formulario")->with("producto",$producto);
	//return "ho";
}


public function nuevo2(){

	// $proyectos = Proyecto::create(Input::all());

	$data = Input::all();
	$producto = new Producto;


	if($producto->isValid($data))
	{
		$producto->fill($data);
		$producto->save();

		return Redirect::to("producto");
	}
	else
	{
		return Redirect::to("producto/nuevo")->withInput()->withErrors($cliente->errors);
	}

	


	
}



public function editar($id){

	$producto = Producto::find($id);

	return View::make("productos.formulario")->with("producto",$producto);
}

public function editar2($id){


$data = Input::all();
	$producto = Producto::find($id);


	if($producto->isValid($data))
	{
		$producto->fill($data);
		$producto->save();

		return Redirect::to("producto");
	}
	else
	{
		return Redirect::to("producto/nuevo")->withInput()->withErrors($producto->errors);
	}

}

public function eliminar()
{
		$id = Input::get('id'); //acedemos a la variable id traida por AJAX ($.get)
        $producto = Producto::find($id);

        $producto->delete();
        //return $id;
}



}