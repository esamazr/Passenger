<?php
namespace app\models;
class BookingModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function getBooking()
{
    return $this->db->get('bookings');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('bookings');
}
public function addBooking($data){

    return $this->db->insert('bookings',$data);
}
public function updateBooking($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('bookings', $data);
}
 
public function deleteBooking($id) {
    $this->db->where('id', $id);
    return $this->db->delete('bookings');
}
}
?>