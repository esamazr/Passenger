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
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('tickets');
}
public function addTrip($data){

    return $this->db->insert('tickets',$data);
}
public function updateTrip($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('tickets', $data);
}
 
public function deleteTrip($id) {
    $this->db->where('id', $id);
    return $this->db->delete('tickets');
}
}
?>