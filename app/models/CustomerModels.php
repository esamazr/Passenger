<?php
namespace app\models;

class CustomerModels {
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
    public function updatecustomers($id,$data)
    {
    
        $this->db->where('id', $id);
    return $this->db->update('customers', $data);

    }
    public function deletecustomers($id) 
    {
        $this->db->where('id', $id);
    return $this->db->delete('customers');
    }
    public function getcustomersbyId($id)
    {
        return $this->db->where('id',$id)->getone('customers') ;
    }
}


?>