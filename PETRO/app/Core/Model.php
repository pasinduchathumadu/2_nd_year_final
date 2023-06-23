<?php

class Model extends Database
{
  protected $table = 'fuel_pumper';
    public function connection(){
      $result=$this->connect();
      return $result;
    }
   
   
    public function mail($model){
      require_once '../app/core/'.$model.'.php';

      return new $model();
  }
  public function pdf($model){
    require_once '../app/core/'.$model.'.php';

    return new $model();
}
}