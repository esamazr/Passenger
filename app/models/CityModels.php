<?php
namespace app\models;
class CityModels{
    private $db;

public function __construct($db)
{
    $this->db=$db;
}
public static function getCityName($cityId) {
      
      
    $query = "SELECT name FROM cities WHERE id = $cityId";

  

 
    $city = $query->fetch(PDO::FETCH_ASSOC);

    return $city['city_name'];
}

public function getcity()
{
    return $this->db->get('cities');
}
public function gettById($id)
{  return $this->db->where('id', $id)->getOne('cities');
}
public function addcity($data){

    return $this->db->insert('cities',$data);
}
public function updatecity($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('cities', $data);
}
 
public function deletecity($id) {
    $this->db->where('id', $id);
    return $this->db->delete('cities');
}
}
?>