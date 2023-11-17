<?php
namespace app\models;
class TicketModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


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