<?php
require __DIR__ .'/../model/ratingModel.php';

class ratingController{

    private $model;

    public function __construct($db){

      $this->model= new ratingModel($db);

    }
    public function  jsonResponce($data){
        header("Content-type:application/json");
        echo json_encode($data);
        
      }
      //عرض جدول التقييم
      public function showRate() {
        $rating = $this->model->get();
        $this->jsonResponce($rating);
      }
//اضافة تقييم
    public function addrating(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $rating=$_POST['rate_u'];
        $id_d=$_POST['id_d'];
        $id_u=$_POST['id_u'];

        $data=[
        'id_d' => $id_d,
        'id_u'  => $id_u,
        'rate_u' => $rating,
              ];

      if($this->model->add($data)){
            
        $this->jsonResponce( ['message'=>'done']);
     
     }else {
        $this->jsonResponce(['error'=>"failed to add rating."]);
           }
       }
    }
   
 
    public function numUsers($id)
    {
      $num_user=$this->model->numUsers($id);
      return $num_user;
      
    }
    public function sumRate($id)
    {  
      $Sum_rate=$this->model->sumRate($id);
      return $Sum_rate;
     
    }
     // حساب المتوسط الحسابي لتقييم كل طبيب
    public function avgRating($id) {

         $sum=$this->sumRate($id);
         $num=$this->numUsers($id);
         $this->jsonResponce(['result'=>$sum/$num]);
        
        }

}