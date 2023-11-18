<?php 
use app\models\CustomerModels;
namespace app\controllers;
class CustomerController {
    private $model ;
    public function __construct($model)
    {
      $this->model = $model ;
   
    }
    public function getCustomer(){
        $json=json_encode ( $this->model->getcustomers());
        echo $json."<br>";
         
    }
    public function getCustomerById($id){
        return $this->model->getcustomersbyId($id) ;
         
    }
    public function updateCustomer($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
 
        $data = array(
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email']
        );

        $result = $this->model->updatecustomers($id, $data);

        if ($result) {
            echo "customer updated successfully!";
          
        } else {
            echo "Failed to update customer!";
        }
        }
        }
    public function addCustomer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];

            $data = [
                'name' => $name,
                'phone' => $phone,
                'gender' => $gender,
                'email' => $email
            ];

            if ($this->model->addcustomers($data)) {
                echo  json_encode(array("status"=>true,"data"=>$data));
            } else {
                echo "Failed to add customer.";
            }
        }
    }


    public function deleteCustomer($id)
    { if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        
        $result = $this->model->deletecustomers($id);

        if ($result) {
            echo "customer deleted successfully!";
        } else {
            echo "Failed to delete customer!";
        }
}
}
}

?> 