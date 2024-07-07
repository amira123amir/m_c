<?php
require __DIR__ .'/../model/adminModel.php';

class adminController{
    private $model;

    public function __construct($db){

      $this->model= new adminModel($db);

    }
    public function  jsonResponce($data){
        header("Content-type:application/json");
        echo json_encode($data);
        
      }

      public function addAdmin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $name_a=$_POST['name_a'];
          $password=$_POST['password'];
          $data=[
          'name_a' => $name_a,
          'password'  => $password,
         
                ];
  
        if($this->model->add($data)){
              
          $this->jsonResponce( ['message'=>'done']);
       
       }else {
          $this->jsonResponce(['error'=>"failed to add rating."]);
             }
         }
      }


}