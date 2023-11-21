<?php 
 
trait CreditCardLogin {
    public function loginWithCreditCard($cardNumber, $expirationDate, $cvv) {
      
    
            if ($isValidCreditCard) {
            $admin = $this->getAdminFromDatabase($cardNumber);
            
   
            if ($admin) {
                $this->displayAdminData($admin);
                return true;
            }
        }
        
        return false;
    }
    
    private function getAdminFromDatabase($cardNumber) {
        
        return $admin;
    }
    
    private function displayAdminData($admin) {
     
    }
}

class User {
    use CreditCardLogin;
     
}

 
$user = new User();
$result = $user->loginWithCreditCard('1234567890123456', '12/24', '123');
if ($result) {
    echo 'تم تسجيل الدخول بنجاح!';
} else {
    echo 'فشل تسجيل الدخول!';
}