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
public function view() {
 /*    $sql = "SELECT bookings.booking_date,hotels.name,customers.name
    FROM bookings
    JOIN hotels ON bookings.hotel_id=hotels.id and bookings.customer_id=customers.id";

$results = $this->db->rawQuery($sql);
return $results; */



$this->db->join('hotels','hotels.id=bookings.hotel_id','LEFT');
$this->db->join('customers','customers.id = bookings.customer_id','INNER');
 
$results = $this->db->get('bookings',null,'bookings.booking_date,hotels.name,customers.email');
return $results;
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