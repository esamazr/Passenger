<?php
namespace app\models;
class BookingModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function get()
{
    return $this->db->get('bookings');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('bookings');
}
public function addHotel($data){

    return $this->db->insert('bookings',$data);
}
public function updateHotel($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('bookings', $data);
}
 
public function deleteHotel($id) {
    $this->db->where('id', $id);
    return $this->db->delete('bookings');
}
}
?>