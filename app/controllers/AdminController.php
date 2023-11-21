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
            echo "Failed to delete admin!";
        }
        }
    }
    public function getcard(){ 
        if(isset(getallheaders()['c']) && $this->model->gitAdmincard(getallheaders()['CARD'])) 
             return; 
        if($_SERVER["REQUEST_METHOD"] == "POST"){ 
         
         if($data=$this->model->gitAdminAll($_POST["email"],$_POST["password"])) 
         { 
        $CARD=rand(); 
        $datab=[ 
        'name'=>$data['name'], 
        'email'=>$data['email'], 
        'password'=>$data['password'], 
        'card'=>$CARD]; 
        $this->model->updateAdmin($data["id"],$datab); 
       
        echo   json_encode($CARD);
         } 
        else{ echo "fail";} 
         
         } 
        
         
        }
        public function login(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){ 
               
            if($this->model->gitAdmincard($_POST["card"])) 
            {
            $d = $this->model->view();
            echo json_encode($d);
            
            }

            else 
            echo   json_encode("false");
            

        }
    }
    
}

?>