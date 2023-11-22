<?php
namespace app\models;
class TicketModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}
  
public function viewbydatebetween($startDate,$endDate) {
   
    $stmt = $this->db->prepare("SELECT * FROM tickets WHERE date_s BETWEEN :startDate AND :endDate");
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDate);
    $stmt= $this->db->join('tickets','hotels.customer_id=customers.id');
    $stmt = $this->db->get('customers',null,'customers.name');
    
   
 
   
   return $stmt;
   }
public function get()
{
    return $this->db->get('tickets');
}
public function getTicketById($id)
{  return $this->db->where('id', $id)->getOne('tickets');
}
public function addTicket($data){

    return $this->db->insert('tickets',$data);
}
public function updateTicket($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('tickets', $data);
}
 
public function deleteTicket($id) {
    $this->db->where('id', $id);
    return $this->db->delete('tickets');
}
}
?>