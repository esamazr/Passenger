<?php
//  namespace app\controllers;
// require __DIR__.'/../models/BookingModels.php';
use app\models\BookingModels;
namespace app\controllers;
class BookingController
 {
    private $model;
    public function __construct($model)
    {
      $this->model = $model ;
   
      $_SESSION['Admin']="true";
    }
    public function getBooking()
    {
        $json=json_encode ($this->model->getBooking());
        echo $json."<br>";
         
    }
    public function getgetBookingtById($id)
    {
        return $this->model->gettById($id) ;
    }
    public function updateBooking($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
         
 
        $data = array(
            'ticket_id' => $_POST['ticket_id'],
            'customer_id' => $_POST['customer_id'],
            'hotel_id' => $_POST['hotel_id'],
            'booking_date' => $_POST['booking_date'],
        );

        $result = $this->model->updateBooking($id, $data);

        if ($result) {
            echo "Booking updated successfully!";
            
        } else {
            echo "Failed to update Booking!";
        }
    
        
    }
    }
    
    public function addBooking() {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticket_id=$_POST['ticket_id'];
            $customer_id=$_POST['customer_id'];
            $hotel_id=$_POST['hotel_id'];
            $booking_date=$_POST['booking_date'];
            $data = [
                'ticket_id' =>$ticket_id,
                'customer_id' => $customer_id,
                'hotel_id'=>$hotel_id,
                'booking_date'=>$booking_date
            ];

            if ($this->model->addBooking($data)) {
                echo  json_encode(array("status"=>true,"data"=>$data));
            } else {
                echo "Failed to add user.";
            }
        
    }
    }


    public function deleteBooking($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $this->model->deleteBooking($id);

        if ($result) {
            echo "Booking deleted successfully!";
        } else {
            echo "Failed to delete Booking!";
        }
    }
}
}


?>