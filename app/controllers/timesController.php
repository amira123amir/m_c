<?php
//namespace app\controllers\UserController;

require __DIR__.'/../models/timesModel.php';
//use app\models\UserModel;

class timesController {
    private $model;
    public function __construct($db) {
      
        $this->model = new timesModel($db);
    }
   
        public function addt($z,$f) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $date = $_POST['date'];
               $hour = $_POST['hour'];
              $id_d1=$z;
                $id_u1=$f;
        
             if($this->model->checkdate($date,$hour)){
                     header("content-type:application/json");
                        echo json_encode(['message'=>'notsuccesfuly',
                                         'attention'=>'please you should choose another time'
                                                           ]);

                     } else{
                     $this->model->add_date($id_d1,$id_u1,$date,$hour);
                    header("content-type:application/json");
                    echo json_encode(['message'=>'succesfuly']);
                }
                }
            }
        
   public function showd() {
        $dc = $this->model->showd();
        header("content-type:application/json");
       echo json_encode($dc);
    }

    public function checkdatehour(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            if($this->model->checkdatehour($date)){
                     $this->hoursdate($date);
                     header("content-type:application/json");
                   
               }
            else{
                header("content-type:application/json");
                $hours=array("9","10","11","12","13","14");
                foreach($hours as $v2){
                    echo json_encode(['hour'=>$v2]);
                }
            
            }

            }
        }

    public function hoursdate($d1){
        $d2=$d1;
        $notvalid=$this->model->hoursdate($d2);
        $hours=array("9","10","11","12","13","14");
       $not=array();
                         foreach($notvalid as $f1=>$f2){
                        foreach($f2 as $f3=>$f4){
                         static  $i=0;
                          $not[$i]=$f4;
                               $i++;
                                       }
                                              }

            $valid =array_diff($hours,$not);
            foreach($valid as $v1=>$v2){
            echo json_encode(['hour'=>$v2]);
            }
         }
   
}
?>