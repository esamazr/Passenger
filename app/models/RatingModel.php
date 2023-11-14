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
        $this->db->where('username', $searchTerm, 'LIKE');
        return $this->db->get('ratings');
    }
}
