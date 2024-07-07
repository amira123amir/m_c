<?php

class userModel{
    private $db;
    public function __construct($db){
        $this->db = $db; 
    }
    public function get(){
        return $this->db->get('users');
    }
    public function getUserBYId($id) {
        return $this->db->where('id_u',$id)->getOne('users');
    }
     
    public function add($data) {
        return $this->db->insert('users',$data);
    }
    public function update($id,$data) {
        $this->db->where('id_u',$id);
        return $this->db->update('users',$data);

    }

    public function delete($id) {
        $this->db->where('id_u', $id);
        return $this->db->delete('users');
    }
}