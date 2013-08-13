<?php
  $program = new program();
  class program {

    public function __construct() {

     if($_REQUEST == NULL) {
       $this->homepage();
     } elseif($_REQUEST['page'] == 'bankform') {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
          $this->bankform();
        } else {
          $transactions = new transactions();
         if(array_key_exists('moretranstype', $_POST)) {
           $transactions->addTransaction($_POST['type'],$_POST['amount'],$_POST['source']);
           header('Location: http://www.mywebclass.org/gitexample/index.php?page=bankform');
         } else {
           $transactions->addTransaction($_POST['type'],$_POST['amount'],$_POST['source']);
           $transactions->printTransactions();
         } 
       }   
    }  




    }

    function homepage() {
      
      echo 'hello welcome to my program <br>';
      echo '<a href="./index.php?page=bankform">Click to View Bank Form</a>';

    }

    function bankform() {

       $form = new debitcredit();

       $form->printform();    
    }

  }


  class transactions {
    public $transactions = array();
     public function __construct() {

         session_start();

     }
     public function addTransaction($type, $amount, $source) {
       $transaction = new transaction();
       $transaction->setType($type);
       $transaction->setAmount($amount);
       $transaction->setSource($source);
       $_SESSION['transactions'][] = $transaction;
     } 
     
     public function countTransactions() {
       $count = count($this->transactions);

       return $count;
     }
    public function printTransactions() {
      foreach($_SESSION['transactions'] as $transaction) {
	$transaction->printTransaction();
      }
    }  
  
  }

  class transaction  {
    public $type;
    public $amount;
    public $source;
   

    public function setType($type) {
      $this->type = $type;
    } 
    public function setAmount($amount) {
      $this->amount = $amount;
    }
    public function setSource($source) {
      $this->source = $source;
    }
    
    public function getType() {
      return $this->type;
    }
    public function getAmount() {
      return $this->amount;
    }
    public function getSource() {
      return $this->source;
    }
    public function getTransaction() {
      $transaction = array();
      $transaction['type'] = $this->type;
      $transaction['amount'] = $this->amount;
      $transaction['source'] = $this->source;
      return $transaction;
    }
    public function printTransaction() {
      echo '<hr>'; 
      echo 'Transaction type: ' .   $this->type . "<br> \n";
      echo 'Transaction amount: ' . $this->amount . "<br> \n";
      echo 'Transaction source: ' . $this->source . "<br> \n"; 

    }

  }
 

  class debitcredit {

    public function printform() {
      $form = '<br>
              <FORM action="index.php?page=bankform" method="post">
                <fieldset>
                  <LABEL for="amount">Amount: </LABEL>
                    <INPUT type="text" name="amount" id="lastname"><BR>
                  <LABEL for="source">Source: </LABEL>
                    <INPUT type="text" name="source" id="lastname"><BR>
                    <INPUT type="radio" name="type" value="debit"> Debit<BR>
                    <INPUT type="radio" name="type" value="credit"> Credit<BR>
                    <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                    <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';

      echo $form;
   }
}


?>
