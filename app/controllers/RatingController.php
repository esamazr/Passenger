<?php
use app\models\RatingModel;
namespace app\controllers;
 
 
class RatingController{
    private $model;
    public function __construct($model)
    {
      $this->model = $model ;
   
      $_SESSION['Admin']="true";
    }
    public function addRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
$hotel_id=$_POST["hotel_id"];
$customer_id=$_POST["customer_id"];
$rate=$_POST["rate"];
$comment=$_POST["comment"];
$data = ["hotel_id"=>$hotel_id,"customer_id"=>$customer_id,"rate"=>$rate, "comment"=>$comment] ;

        
        $this->model->addRating($data);
        echo   json_encode(array("status"=>true,"data"=>$data));
    }
         
    }
    public function deleteRating($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         
         $result=$this->model->deleteRating($id);
        if ($result) {
            echo "Rating deleted successfully!";
        } else {
            echo "Failed to delete Rating!";
        }
        }
    }
    public function updateRating($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["rate"=>$_POST["rate"],
         "comment"=>$_POST["comment"]
        ];
        
         echo json_encode($this->model->updateRating($id,$data));
        }
        
    }
    public function getAllRatings(){
        $d = $this->model->getRating();
        echo json_encode($d);
    }
 
  
    public function getMaxRatedHotels(){
        $hotelsWithRates = $this->model->getRating("Desc");
        $maxRatedHotels = [];
        $maxRate = $hotelsWithRates[0]["rate"];
        foreach($hotelsWithRates as $hotel) {
            if($hotel["rate"] == $maxRate) {
                array_push($maxRatedHotels, $hotel);
            } else {
                break;
            }
        }
        echo json_encode($maxRatedHotels);
    }
    
    public function getMinRatedHotels(){
        $hotelsWithRates = $this->model->getRating("Asc");
        $minRatedHotels = [];
        $minRate = $hotelsWithRates[0]["rate"];
        foreach($hotelsWithRates as $hotel) {
            if($hotel["rate"] == $minRate) {
                array_push($minRatedHotels, $hotel);
            } else {      
                break;
            }
        }       
        echo json_encode($minRatedHotels);
    }
    public function searchRating($searchTerm) {
     
        return $this->model->searchRating($searchTerm) ;
    }
    public function viewRating() {
      
        $d = $this->model->view();
        echo json_encode($d);
        
      
    } 
}