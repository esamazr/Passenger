<?php
namespace app\models;

class CustomerModel {
    private $db ;
    public function __construct($db)
    {
        $this->db = $db ;
    }
    public function getcustomers()
    {
        return $this->db->get('customers') ;
    }
    public function addcustomers($data)
    {
        return $this->db->insert('customers',$data) ;
    }
    public function updatecustomers($data,$id)
    {
        $where = $this->db->where('id',$id) ;
        $update = $this->db->update('customers',$data) ;
        return $update ;

    }
    public function deletecustomers($id) 
    {
        $where = $this->db->where('id' ,$id) ;
        $delete = $this->db->delete('customers') ;
        return $delete ;
    }
    public function getcustomersbyId($id)
    {
        return $this->db->where('id',$id)->getone('customers') ;
    }
}


?>