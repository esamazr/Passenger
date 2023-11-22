<?php
 
use app\models\HotelModels;
//use app\models\CityModels;
namespace app\controllers;
class HotelController{
    private $model;
    public function __construct($model)
    {
      $this->model = $model ;
   
      $_SESSION['Admin']="true";
    }
    
    public function addHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["name"=>$_POST["name"],
         "city_id" => $_POST["city_id"]
        ];
      //  $hotels =  $this->model->getHotelsByCity($data["city_id"]);
       // echo   json_encode($hotels);
       // $cityName = CityModels::getCityName($cityId);
         $this->model->addHotel($data);
         echo   json_encode(array("status"=>true,"data"=>$data));
        }
        else 
         echo "Not found Data";
    }
    public function updateHotel($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
         
 
        $data = array(
            'name' => $_POST['name'],
            'city_id' => $_POST['city_id'],
           
        );

        $result = $this->model->updateHotel($id, $data);

        if ($result) {
            echo "hotal updated successfully!";
           
        } else {
            echo "Failed to update hotal!";
        }
    
        
    }
    }
    public function deleteHotel($id){
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $result=$this->model->deleteHotel($id);
        if ($result) {
            echo "hotal deleted successfully!";
        } else {
            echo "Failed to delete hotal!";
        }
    }
    }
    public function getHotel(){
       
        $json=json_encode($this->model->get());
        echo $json."<br>";
    }
    public function getAlHotelsInCity(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $d = $this->model->getAllHotelsInCity($_POST["city_id"]);
        echo json_encode($d);
        }
        else
        echo "No found Data";
    }
}