<?php
//namespace app\controllers\UserController;

require __DIR__.'/../models/statesModel.php';
//use app\models\UserModel;

class statesController {
    private $model;
    public function __construct($db) {
      
        $this->model = new statesModel($db);
    }
        public function addstates($z) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $sta = $_POST['state_u'];
               $an = $_POST['analysis'];
                $th=$_POST['therapy'];
                if($this->model->checkidt($z)){
                    header("content-type:application/json");
                    echo json_encode(['message'=>'notsuccesfuly',
                    'attention'=>'please you should choose another state']);
                 }else{
                    
                    $this->model->addstates($z,$sta,$an,$th);
                    header("content-type:application/json");
                    echo json_encode(['message'=>'succesfuly']);
                 }
                               }
                          }

   public function showinfoabouttime() {
        $st = $this->model->showinfoabouttime();
       echo json_encode($st);
       header("content-type:application/json");
    }          
            }
?>