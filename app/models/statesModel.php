<?php
class statesModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

           public function addstates($id_t,$sta,$an,$th){
                      $data = Array ("id_t" => $id_t,
                                     "state_u" => $sta,
                                        "analysis" => $an,
                                        "therapy"=>$th
                                                );
                                      return  $insert1 = $this->db->insert('states', $data);
                                                                 } 
             public function showinfoabouttime() {
                  
                    $this->db->join("doctors d", "d.id_d=t.id_d", "INNER");  
                    $this->db->join("users u", "u.id_u=t.id_u", "INNER");  
                      return  $products = $this->db->get("times t", null, "t.date,t.hour,name_d,name_u,id_t"); 
                                                 }

                         public function checkidt($id_t){
      
                            $this->db->where ("id_t", $id_t);
                              return $user = $this->db->get("states"); 
                                                              }

}
?>