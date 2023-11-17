<?php
// namespace app\controllers;
//require __DIR__.'/../models/AdminModels.php';
use app\models\AdminModels;
namespace app\controllers;
class AdminController {
    private $model ;
    public function __construct($model)
    {
      $this->model = $model ;
      session_start();
      $_SESSION['Admin']="true";
    
    }
    public function getadmin()
    {
       
        $json=json_encode($this->model->getAdmin());
echo $json."<br>";
       
    }
 
    public function getadminById($id)
    {
        return $this->model->gettById($id) ;
    }
    public function addadmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = ["name"=>$name , "email"=>$email, "password"=>$password] ;
        $this->model->addAdmin($data) ;
     

        echo   json_encode(array("status"=>true,"data"=>$data));
        }
    }
    public function updateadmin($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = ["name"=>$name , "email"=>$email, "password"=>$password] ;
        echo json_encode($this->model->updateAdmin($id, $data));
    }}
    public function deleteadmin($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result=$this->model->deleteAdmin($id);
        if ($result) {
            echo "admin deleted successfully!";
        } else {
            echo "Failed to delete Booking!";
        }
        }
    }
}

?>