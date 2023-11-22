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
public function view() {
 

   
   $this->db->join('hotels','hotels.id=bookings.hotel_id','LEFT');
   $this->db->join('customers','customers.id = bookings.customer_id','INNER');
    
   $results = $this->db->get('bookings',null,'bookings.booking_date,hotels.name,customers.email');
   return $results;
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



 
public function gitAdminAll($email,$password){ 
    return $this->db->where('email', $email)->where('password',$password)->getone('admins'); 

} 
public function gitAdmincard($card){ 
return $this->db->where('card', $card)->getone('admins'); 

}
}

?>