
<?php
require_once __DIR__. "/lib/MysqliDb.php";
require_once __DIR__. "/config/config.php";
spl_autoload_register(function($class)
{
    require "./$class.php";
});
 
//$action =isset($_GET['action'])? $_GET['action']: 'index';
$config=require "config/config.php";
$db=new MysqliDb($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$requset=$_SERVER['REQUEST_URI'];
define('BASE_PATH','/Passenger/');

 
 //var_dump($requset);
 $CityModels = new \app\models\CityModels($db) ;
$CityController = new app\controllers\CityController($CityModels) ;
$modelbooking = new \app\models\BookingModels($db);
$controllerbooking = new app\controllers\BookingController($modelbooking); 
$modeladmin=new \app\models\AdminModels($db);
$controlleradmin =new app\controllers\AdminController($modeladmin);
 $modelcompany =new \app\models\CompanyModel($db) ;
$CompanyController = new app\controllers\CompanyController($modelcompany) ;
$modelcustomer = new \app\models\CustomerModels($db) ;
$controllercustomer = new app\controllers\CustomerController($modelcustomer);
$modelhotel = new \app\models\HotelModels($db) ;
$HotelController = new app\controllers\HotelController($modelhotel) ;
$modelrating =new \app\models\RatingModel($db) ;
$controllerrating = new app\controllers\RatingController($modelrating) ; 
$modelticket = new \app\models\TicketModels($db) ;
$TicketController =new app\controllers\TicketController($modelticket) ;  
switch ($requset)
{
    /* case BASE_PATH .'getadmin':
        $controlleradmin->getadmin();
        break; */
        case BASE_PATH:
            $controllerbooking->viewbooking();
            break;

        case BASE_PATH.'getadmin':
            $controlleradmin->getadmin();
            break;
            case BASE_PATH.'getcard':
                $controlleradmin->getcard();
                break;
            case BASE_PATH.'login':
                $controlleradmin->login();
                break;
    case BASE_PATH.'addadmin':
        $controlleradmin->addadmin();
        break;  
    case BASE_PATH . 'updateadmin?id=' . $_GET['id']:
        $controlleradmin->updateadmin($_GET['id']);
        break;
    case BASE_PATH.'deleteadmin?id='.$_GET['id']:
        $controlleradmin->deleteadmin($_GET['id']) ;
        break;

    case BASE_PATH . 'getcity':
        $CityController->getcity() ;
        break ;
    case BASE_PATH.'addcity':
        $CityController->addcity() ;
        break ;
    case BASE_PATH.'updatecity?id=' . $_GET['id'] :
        $CityController->updatecity($_GET['id']);
        break ;
    case BASE_PATH.'deletecity?id='.$_GET['id']:
        $CityController-> deleteCity($_GET['id']);
        break ;

     case BASE_PATH .'getbooking':
        $controllerbooking->getBooking();
        break;
    case BASE_PATH.'addbooking':
        $controllerbooking->addBooking() ;
        break ;
    case BASE_PATH.'updatebooking?id=' . $_GET['id'] :
        $controllerbooking->updateBooking($_GET['id']);
        break ;
    case BASE_PATH.'deletebooking?id='.$_GET['id']:
        $controllerbooking->deleteBooking($_GET['id']) ;
        break ; 
        case BASE_PATH.'viewbooking': 
            $controllerbooking->viewbooking() ;
            break ; 

    case BASE_PATH.'getcompany' :
        $CompanyController->getCompany();
        break ;
    case BASE_PATH.'addcompany':
        $CompanyController->addCompany();
        break ;
    case BASE_PATH.'updatecompany?id='. $_GET['id']:
        $CompanyController->updateCompany($_GET['id']);
        break ;
    case BASE_PATH.'deletecompany?id='.$_GET['id'] :
        $CompanyController->deleteCompany($_GET['id'] ) ;
        break ;

   case BASE_PATH.'getcustomer' :
        $controllercustomer->getcustomer() ;
        break ; 
    case BASE_PATH.'addcustomer':
        $controllercustomer->addCustomer() ;
        break ;
    case BASE_PATH.'updatecustomer?id='. $_GET['id']:
        $controllercustomer->updateCustomer($_GET['id']) ;
        break ;
    case BASE_PATH.'deletecustomer?id='.$_GET['id'] :
        $controllercustomer->deleteCustomer($_GET['id']) ;
        break ; 

    case BASE_PATH.'gethotel' :
        $HotelController->getHotel() ;
        break ;
    case BASE_PATH.'addhotel':
        $HotelController->addHotel() ;
        break ;
    case BASE_PATH.'updatehotel?id='. $_GET['id']:
        $HotelController->updateHotel($_GET['id']);
        break ;
    case BASE_PATH.'deletehotel?id='.$_GET['id'] :
        $HotelController->deleteHotel($_GET['id']) ;
        break;

    case BASE_PATH.'getrating' :  
        $controllerrating->getAllRatings() ;
        break ;
    case BASE_PATH.'addrating':
        $controllerrating->addRate() ;
        break ;
    case BASE_PATH.'updaterating?id='. $_GET['id']:
        $controllerrating->updateRating($_GET['id']) ;
        break ;
    case BASE_PATH.'deleterating?id='.$_GET['id'] : 
        $controllerrating->deleteRating($_GET['id']) ;
        break ;
     /*    case BASE_PATH.'searchrating?searchTerm='. $_GET['searchTerm']: 
            $controllerrating->searchRating($_GET['searchTerm']) ;
            break ; */

            case BASE_PATH.'getMinRatedHotels': 
                $controllerrating->getMinRatedHotels() ;
                break ;
                case BASE_PATH.'getMaxRatedHotels': 
                    $controllerrating->getMaxRatedHotels() ;
                    break ;
                     case BASE_PATH.'viewRating': 
                        $controllerrating->viewRating() ;
                        break ; 
   case BASE_PATH.'getticket' :
        $TicketController->get() ;
        break ;
    case BASE_PATH.'addticket':
        $TicketController->addTicket() ;
        break ;
    case BASE_PATH.'updateticket?id='. $_GET['id']:
        $TicketController->updateTicket($_GET['id']) ;
        break ;
    case BASE_PATH.'deleteticket?id='.$_GET['id'] :  
        $TicketController->deleteTicket($_GET['id']) ;
        break ; 
    
}



 

?> 