<?php
namespace app\models;
class AdminModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function getAdmin()
{
    return $this->db->get('admins');
  
    
}
 
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('admins');
}
public function addAdmin($data){

    return $this->db->insert('admins',$data);
}
public function updateAdmin($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('admins', $data);
}
 
public function deleteAdmin($id) {
    $this->db->where('id', $id);
    return $this->db->delete('admins');
}
}
?>