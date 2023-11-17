<?php
namespace app\models;
class CityModels{
    private $db;

public function __construct($db)
{
    $this->db=$db;
}

public function getcity()
{
    return $this->db->get('cities');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('cities');
}
public function addcity($data){

    return $this->db->insert('cities',$data);
}
public function updatecity($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('cities', $data);
}
 
public function deletecity($id) {
    $this->db->where('id', $id);
    return $this->db->delete('cities');
}
}
?>