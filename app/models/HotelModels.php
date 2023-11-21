<?php
namespace app\models;
class HotelModels{
    private $db;

public function __construct($db)
{
    

    $this->db=$db;


}
public static function getHotelsByCity($cityId) {  
 //   $query = "SELECT name FROM hotels JOIN cities ON hotels.city_id = cities.id WHERE cities.id = $cityId";

    $this->db->join('hotels','hotels.city_id=cities.id','INNER');
    $this->db->WHERE("'cities.id' = $cityId");
     
    $results = $this->db->get('hotels',null,'hotels.name');
     
   
    return $results; 

    
}

public function get()
{
    return $this->db->get('hotels');
}
public function getHotelById($id)
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