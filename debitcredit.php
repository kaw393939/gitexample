<?php

  $obj = new debitcreditform();

  //$obj->displayform(); 

  $transaction = new transaction();
  
  $transaction->type = 'debit';
  $transaction->amount = 100;
  $transaction->source = 'Walmart';

  $transactions = new transactions();

  $transactions->addTransaction($transaction);

  $transaction->type = 'debit';
  $transaction->amount = 200;
  $transaction->source = 'Walmart';
  
  $transactions->addTransaction($transaction);


  $count = $transactions->countTransactions();

  echo $count;
  //print_r($transactions); 

  class transactions {
    public $transactions = array();

     public function addTransaction($transaction) {
       $this->transactions[] = $transaction;
     } 
     
     public function countTransactions() {
       $count = count($this->transactions);

       return $count;
     }

  }

  class transaction  {
    public $type;
    public $amount;
    public $source;
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
