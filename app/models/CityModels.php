<?php
namespace app\models;
class CityModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function get()
{
    return $this->db->get('cities');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('cities');
}
public function addHotel($data){

    return $this->db->insert('cities',$data);
}
public function updateHotel($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('cities', $data);
}
 
public function deleteHotel($id) {
    $this->db->where('id', $id);
    return $this->db->delete('cities');
}
}
?>