<?php
class Factura extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'factura';
    protected $fillable = array('cliente_id');



  public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

    public function guia()
    {
        return $this->belongsToMany('Guia');
    }




public $errors;
    
    public function isValid($data) // funcion que valida los datos
    {
        $rules = array(
            
            'cliente_id'     => 'exists:cliente,id',
            "guiavalue" => "required",
            
         
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