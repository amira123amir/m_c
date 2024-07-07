<?php
class timesModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

   public function add_date($id_d,$id_u,$date,$hour){
                      $data = Array ("id_d" => $id_d,
                                     "id_u" => $id_u,
                                        "date" => $date,
                                        "hour"=>$hour
                                                );
                                      return  $insert1 = $this->db->insert('times', $data);
                                                                 }
             public function showd() {
                    $this->db->join("competencies c", "p.id_d=c.id_c", "INNER");  
               return  $products = $this->db->get("doctors p", null, "c.name_c, p.name_d,p.id_d"); 
                                                 }

                    public function checkdate($d1,$d2){
      
                       $this->db->where ("date", $d1);
                         $this->db->where ("hour", $d2);
                               return $user = $this->db->get("times");

                                      }

           public function checkdatehour($date){
      
                 $this->db->where ("date", $date);
                    return $user = $this->db->get("times"); 
                           }
public function hoursdate($d1){
    $cols=Array ("hour");
     $this->db->where('date',$d1);
   // $this->db->groupBy ("date");
   return $notvalid= $this->db->get ('times',null,$cols);

     }

}
?>