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

