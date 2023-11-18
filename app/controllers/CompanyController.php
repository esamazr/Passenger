<?php
// use app\models\BookingModels;
namespace app\controllers;
class CompanyController{

     private $model;

     public function __construct($model){
        $this->model = $model;

     }

     public function getcompany()
     
     {
        $json = json_encode($this->model->getCompany());
        echo $json."<br>";
     }

     public function getgetCompanytById($id)
    {
        return $this->model->getCompanyById($id) ;
    }
    public function updatecompany($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
 
        $data = array(
            'title' => $_POST['title'],
            'addres' => $_POST['addres'],
            'phone' => $_POST['phone'] 
        );

        $result = $this->model->updateCompany($id, $data);

        if ($result) {
            echo "company updated successfully!";
          
        } else {
            echo "Failed to update company!";
        }
        }
        }

     public function addcompany()
     {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title=$_POST['title'];
            $addres=$_POST['addres'] ;
            $phone=$_POST['phone'] ;
            $data = [
                'title' =>$title,
                'addres' => $addres,
                'phone' => $phone

            ];

            if ($this->model->addCompany($data)) {
                echo  json_encode(array("status"=>true,"data"=>$data));
            } else {
                echo "Failed to add company.";
            }
        }
    }


    public function deletecompany($id)
    { if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        
        $result = $this->model->deleteCompany($id);

        if ($result) {
            echo "company deleted successfully!";
        } else {
            echo "Failed to delete company!";
        }
}
}
}









?>