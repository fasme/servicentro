<?php
class Facturasg extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'facturasg';
    protected $fillable = array('producto_id','cliente_id','cantidad','descripcion','precio','valorbencina','tipopago','impuesto','variable','fecha');



  public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

    public function producto()
    {
        return $this->belongsTo('Producto');
    }


    public function factura()
    {
        return $this->belongsToMany('Factura');
    }



public $errors;
    
    public function isValid($data) // funcion que valida los datos
    {
        $rules = array(
            'producto_id' => 'exists:producto,id',
            'cliente_id'     => 'exists:cliente,id',
            
            'precio' => 'required|integer'
         
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