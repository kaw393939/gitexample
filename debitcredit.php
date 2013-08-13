<?php

  $transactions = new transactions();
  
  $transactions->addTransaction('debit', 100, 'Walmart');
  $transactions->addTransaction('debit', 200, 'Target');

//  $count = $transactions->countTransactions();

  $transactions->printTransactions();


  class transactions {
    public $transactions = array();

     public function addTransaction($type, $amount, $source) {
       $transaction = new transaction();
       $transaction->setType($type);
       $transaction->setAmount($amount);
       $transaction->setSource($source);

       $this->transactions[] = $transaction;
     } 
     
     public function countTransactions() {
       $count = count($this->transactions);

       return $count;
     }
    public function printTransactions() {
      foreach($this->transactions as $transaction) {
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
    
    public function printTransaction() {
      echo '<hr>'; 
      echo 'Transaction type: ' . $this->type . "<br> \n";
      echo 'Transaction amount: ' . $this->amount . "<br> \n";
      echo 'Transaction source: ' . $this->source . "<br> \n"; 

    }

  }
 

  class debitcreditform {


    public function displayform() {
      $form = '<br>
              <FORM action="form.php" method="post">
                <fieldset>
                  <LABEL for="amount">Amount: </LABEL>
                    <INPUT type="text" name="amount" id="lastname"><BR>
                    <INPUT type="radio" name="trans_type" value="debt"> Debit<BR>
                    <INPUT type="radio" name="trans_type" value="credit"> Credit<BR>
                  <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';

      echo $form;
   }
}


?>
