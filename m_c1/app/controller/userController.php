<?php
require __DIR__.'/../model/userModel.php';

class userController{
    private $model;

    public function __construct($db){

      $this->model= new userModel($db);

    }
    public function jsonResponce($data){
        header("Content-type:application/json");
        echo json_encode($data);
        
      }
      //احضار كافة المرضى
      public function showAllUser() {
        $users = $this->model->get();
        $this->jsonResponce($users);
      }
      //اضافة مريض 
      public function addUser() {
        if($_SERVER['REQUEST_METHOD']=='POST') {
          $name_u=$_POST['name_u'];
        
          $data= [
            'name_u' => $name_u,
           ];
          
          if($this->model->add($data)){
            
             $this->jsonResponce( ['message'=>'done']);
          
          }else {
             $this->jsonResponce(['error'=>"failed to add user."]);
          }
        }
      }
      //اظهار مريض واحد
      public function showUser($id) {
        header("Content-type:application/json");
        $users = $this->model->getUserById($id);
        if($users){
          echo json_encode($users);
        }else{
          echo json_encode(['message'=>'failed to show User']);
        }
      }
     //حذف المريض 
      public function deleteUser($id) {
        header("Content-type:application/json");
        $users=$this->model->delete($id);
        //اول شي التحقق من وجود هل المريض
        var_dump($users);
        if($users) {
          json_encode($users);
          echo  json_encode(['message'=> 'done']);
             
          } else {
              echo json_encode(['message'=> 'Failed to delete user.']);//في حال ماموجود المريض بيطبع غلط
          }
      }
      //تعديل على المريض
      public function update($id){
        if($_SERVER['REQUEST_METHOD']=='POST') {
          $name_u=$_POST['name_u'];
          $data=[
            'name_u'=> $name_u
          ];
        }
        if($this->model->update($id,$data)){
          echo json_encode(['messag'=>'User updated successfully!']);

        }else{
          echo json_encode(['messag'=>'error']);

        }
      }
}
?>