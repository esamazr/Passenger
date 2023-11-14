<?php
namespace app\models;
class HotelModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function get()
{
    return $this->db->get('hotels');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('hotels');
}
public function addHotel($data){

    return $this->db->insert('hotels',$data);
}
public function updateHotel($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('hotels', $data);
}
 
public function deleteHotel($id) {
    $this->db->where('id', $id);
    return $this->db->delete('hotels');
}
}
?>