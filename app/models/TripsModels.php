<?php

class TripsModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}

public function get()
{
    return $this->db->get('trips');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('trips');
}
public function addTrip($data){

    return $this->db->insert('trips',$data);
}
public function updateTrip($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('trips', $data);
}
 
public function deleteTrip($id) {
    $this->db->where('id', $id);
    return $this->db->delete('trips');
}
}
?>