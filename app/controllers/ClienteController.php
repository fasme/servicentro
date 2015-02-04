<?php
class ClienteController extends BaseController {

public function mostrar(){

	$clientes = Cliente::all();

	return View::make("clientes.lista")->with("clientes",$clientes);

}

public function nuevo(){

	$cliente = new Cliente;
	return View::make("clientes.formulario")->with("cliente",$cliente);
	//return "ho";
}


public function nuevo2(){

	// $proyectos = Proyecto::create(Input::all());

	$data = Input::all();
	$cliente = new Cliente;


	if($cliente->isValid($data))
	{
		$cliente->fill($data);
		$cliente->save();

		return Redirect::to("cliente");
	}
	else
	{
		return Redirect::to("cliente/nuevo")->withInput()->withErrors($cliente->errors);
	}

	


	
}



public function editar($id){

	$cliente = Cliente::find($id);

	return View::make("clientes.formulario")->with("cliente",$cliente);
}

public function editar2($id){


$data = Input::all();
	$cliente = Cliente::find($id);


	if($cliente->isValid($data))
	{
		$cliente->fill($data);
		$cliente->save();

		return Redirect::to("cliente");
	}
	else
	{
		return Redirect::to("cliente/nuevo")->withInput()->withErrors($cliente->errors);
	}

}

public function eliminar()
{
		$id = Input::get('id'); //acedemos a la variable id traida por AJAX ($.get)
        $cliente = Cliente::find($id);

        $cliente->delete();
        //return $id;
}



}