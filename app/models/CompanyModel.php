<?php
namespace app\models;

class CompanyModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCompany() {
        return $this->db->get('companies');
    }

    public function addCompany($data) {
        return $this->db->insert('companies', $data);
    }

    public function getCompanyById($id) {
        return $this->db->where('id', $id)->getOne('companies');
    }

    public function updateCompany($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('companies', $data);
    }

    public function deleteCompany($id) {
        $this->db->where('id', $id);
        return $this->db->delete('companies');
    }

    public function searchCompany($searchTerm) {
        $this->db->where('username', $searchTerm, 'LIKE');
        return $this->db->get('companies');
    }
}
