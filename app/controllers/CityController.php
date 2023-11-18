<?php 
// namespace app\controllers;
//require __DIR__.'/../models/CityModels.php';
namespace app\controllers;
use app\models\CityModels;
class CityController {
    private $model ;
    public function __construct($model)
    {
      $this->model = $model ;
   $_SESSION['Admin']="true";
   
    }
    public function getcity(){
        $json=json_encode ( $this->model->getcity());
        echo $json."<br>";
         
    }
    public function getCityById($id){
        return $this->model->gettById($id) ;
         
    }
    public function updatecity($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
 
        $data = array(
            'name' => $_POST['name'],
            'country' => $_POST['country'] 
        );

        $result = $this->model->updatecity($id, $data);

        if ($result) {
            echo "city updated successfully!";
          
        } else {
            echo "Failed to update city!";
        }
        }
        }
    public function addcity() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name=$_POST['name'];
            $country=$_POST['country'] ;
            $data = [
                'name' =>$name,
                'country' => $country 
            ];

            if ($this->model->addcity($data)) {
                echo  json_encode(array("status"=>true,"data"=>$data));
            } else {
                echo "Failed to add city.";
            }
        }
    }


    public function deleteCity($id)
    { if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        
        $result = $this->model->deletecity($id);

        if ($result) {
            echo "city deleted successfully!";
        } else {
            echo "Failed to delete city!";
        }
}
}
}

?> 