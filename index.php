
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
/* $modelcompany =new \app\models\CompanyModel($db) ;
$controllercompany = new app\controllers\CompanyController($modelcompany) ;
$modelcustomer = new \app\models\CustomerModel($db) ;
$controllercustomer = new app\controllers\CustomerController($modelcustomer);
$modelhotel = new \app\models\HotelModels($db) ;
$controllerhotel = new app\controllers\HotelController($modelhotel) ;
$modelrating =new \app\models\HotelModels($db) ;
$controllerrating = new app\controllers\RatingController($modelrating) ; 
$modelticket = new \app\models\TicketModels($db) ;
$controllerticket =new app\controllers\TicketController($modelticket) ;  */
switch ($requset)
{
    /* case BASE_PATH .'getadmin':
        $controlleradmin->getadmin();
        break; */
        case BASE_PATH:
            $controlleradmin->getadmin();
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

    /* case BASE_PATH.'getcompany' :
        $controllercompany->getCompany();
        break ;
    case BASE_PATH.'addcompany':
        $controllercompany->addCompany();
        break ;
    case BASE_PATH.'updatecompany?id='. $_GET['id']:
        $controllercompany->updateCompany($_GET['id']);
        break ;
    case BASE_PATH.'deletecompany?id='.$_GET['id'] :
        $controllercompany->deleteCompany($_GET['id'] ) ;
        break ;

    case BASE_PATH.'getcustomer' :
        $controllercustomer->getcustomers() ;
        break ; 
    case BASE_PATH.'addcustomer':
        $controllercustomer->addcustomers() ;
        break ;
    case BASE_PATH.'updatecustomer?id='. $_GET['id']:
        $controllercustomer->updatecustomers($_GET['id']) ;
        break ;
    case BASE_PATH.'deletecustomer?id='.$_GET['id'] :
        $controllercustomer->deletecustomers($_GET['id']) ;
        break ;

    case BASE_PATH.'gethotel' :
        $controllerhotel->get() ;
        break ;
    case BASE_PATH.'addhotel':
        $controllerhotel->addHotel() ;
        break ;
    case BASE_PATH.'updatehotel?id='. $_GET['id']:
        $controllerhotel->updateHotel($_GET['id']);
        break ;
    case BASE_PATH.'deletehotel?id='.$_GET['id'] :
        $controllerhotel->deleteHotel($_GET['id']) ;
        break;

    case BASE_PATH.'getrating' :  
        $controllerrating->getRating() ;
        break ;
    case BASE_PATH.'addrating':
        $controllerrating->addRating() ;
        break ;
    case BASE_PATH.'updaterating?id='. $_GET['id']:
        $controllerrating->updateRating($_GET['id']) ;
        break ;
    case BASE_PATH.'deleterating?id='.$_GET['id'] : 
        $controllerrating->deleteRating($_GET['id']) ;
        break ;
        
    case BASE_PATH.'getticket' :
        $controllerticket->get() ;
        break ;
    case BASE_PATH.'addticket':
        $controllerticket->addTicket() ;
        break ;
    case BASE_PATH.'updateticket?id='. $_GET['id']:
        $controllerticket->updateTicket($_GET['id']) ;
        break ;
    case BASE_PATH.'deleteticket?id='.$_GET['id'] :  
        $controllerticket->deleteTicket($_GET['id']) ;
        break ; */
    
}



 

?> 