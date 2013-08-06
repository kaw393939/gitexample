<?php
  $account = new account(10000);
  $account->debit(100);
  $account->credit(200);
  $account->debit(400);
  $account->credit(500);
  $account->credit(1000);
  $account->run();
//  print_r($account);
  class account {
    public $starting_balance;
    public $current_balance;
    public $transactions = array();


    function __construct($starting_balance) {
      $this->starting_balance = $starting_balance;
      $this->current_balance = $starting_balance;
    }
    public function debit($amount) {
     $this->transactions[]['debit'] = $amount;
    }
    public function credit($amount) {
     $this->transactions[]['credit'] = $amount;
    }
    public function run() {
     echo 'Starting Balance: ' . $this->starting_balance . '<br>'; 
     foreach($this->transactions as $transaction) {
       foreach($transaction as $key => $value) { 
        echo $key . ': ' . $value . '<br>';
        if($key == 'debit') {
          $this->current_balance = $this->current_balance - $value;
        } else {
          $this->current_balance = $this->current_balance + $value;
        }
     
       }
     }
      echo 'Current Balance: ' . $this->current_balance; 
    } 
  }


?>
