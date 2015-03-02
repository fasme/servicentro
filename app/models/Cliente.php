<?php
class Cliente extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'cliente';
    protected $fillable = array('nombre','direccion','comuna','rut','giro','ciudad','telefono','vehiculo');



  public function guia()
    {
        return $this->hasMany('Guia');
    }



public $errors;
    
    public function isValid($data) // funcion que valida los datos
    {
        $rules = array(
            'nombre' => 'required',
            'direccion'     => 'required',
            'comuna' => 'required',
            'rut' => 'required',
           
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }





}
?>