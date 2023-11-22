<?php
use app\models\TicketModels;
namespace app\controllers;
 class TicketController {
     private $model ;
     public function __construct($model)
     {
       $this->model = $model ;
    $_SESSION['Admin']="true";
    
     }
     public function get(){
        
         $json=json_encode ($this->model->get());
         echo $json."<br>";
     }
     public function viewbydatebetween() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate=$_POST['startDate'];
            $endDate =$_POST['endDate'] ;
        }
        $d = $this->model->viewbydatebetween($startDate,$endDate);
    echo json_encode($d);
       }
     public function gettickeById($id){
         return $this->model->gettById($id) ;
          
     }
     public function updateticket($id)
     {
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         
  
         $data = array(
             'company_id' => $_POST['company_id'],
             'customer_id' => $_POST['customer_id'],
             'city_id' => $_POST['city_id'],
             'date_s' => $_POST['date_s'],
             'date_e' => $_POST['date_e'],
         );
 
         $result = $this->model->updateTicket($id, $data);
 
         if ($result) {
             echo "tickeupdated successfully!";
          
         } else {
             echo "Failed to update ticke!";
         }
         }
         }
     public function addTicket() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $company_id=$_POST['company_id'];
             $customer_id =$_POST['customer_id'] ;
             $city_id=$_POST['city_id'] ;
             $date_s=$_POST['date_s'] ;
             $date_e =$_POST['date_e'] ;
             $data = [
                 'company_id' =>$company_id,
                 'customer_id' =>$customer_id,
                 'city_id' => $city_id,
                 'date_s' => $date_s,
                 'date_e' => $date_e
             ];
 
             if ($this->model->addTicket($data)) {
                 echo "ticke added successfully!";
             } else {
                 echo "Failed to add ticke.";
             }
         }
     }
 
 
     public function deleteTicket($id)
     { if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         
         
         $result = $this->model->deleteTicket($id);
 
         if ($result) {
             echo "Ticket deleted successfully!";
         } else {
             echo "Failed to delete Ticket!";
         }
 }
 }
 }
 


?>