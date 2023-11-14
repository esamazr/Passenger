<?php
namespace app\models;
class AdminModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function get()
{
    return $this->db->get('admins');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('admins');
}
public function addHotel($data){

    return $this->db->insert('admins',$data);
}
public function updateHotel($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('admins', $data);
}
 
public function deleteHotel($id) {
    $this->db->where('id', $id);
    return $this->db->delete('admins');
}
}
?>