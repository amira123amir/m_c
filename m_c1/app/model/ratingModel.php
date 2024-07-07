<?php

class ratingModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function get()
    {
        return $this->db->get('rating');
    }

    public function add($data) {
        return $this->db->insert('rating',$data);
    }

    public function numUsers($id)
    {    $this->db->where ('id_d', $id);
        return  $this->db->getValue ("rating", "count(*)");
        
       
    }
    public function sumRate($id){
        $this->db->where ('id_d', $id);
        return  $this->db->getValue ("rating", "sum(rate_u)");
       
    }
   
  
}