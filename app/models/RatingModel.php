<?php
namespace app\models;

class RatingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRating() {
        return $this->db->get('ratings');
    }
  /*   public function viewRating() {
        $this->db->join('ratings', 'ratings.hotel_id=hotels.id', 'LEFT');
        $this->db->join('cities', 'cities.id = hotels.city_id', 'INNER');
     //   $db->where('t1.column', 'قيمة');
        return  $this->db->get();
        
      
    } */

    public function view() {
        $sql = "SELECT ratings.rate,hotels.name
        FROM ratings
        JOIN hotels ON ratings.hotel_id=hotels.id";

$results = $this->db->rawQuery($sql);
return $results;
    }
    
    public function addRating($data) {
        return $this->db->insert('ratings', $data);
    }

    public function getRatingById($id) {
        return $this->db->where('id', $id)->getOne('ratings');
    }

    public function updateRating($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('ratings', $data);
    }

    public function deleteRating($id) {
        $this->db->where('id', $id);
        return $this->db->delete('ratings');
    }

    public function searchRating($searchTerm) {
        $this->db->where('rate',$searchTerm,'LIKE');
        return $this->db->get('ratings');
    }
}
