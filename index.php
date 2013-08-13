<?php

//This instantiates the program.

  $program = new program();

//This class is the actual program, it could be considered "Main" in Java



  class program {
//This is the constructor that determines what to do when a request is made.
    public function __construct() {
//This if statement figures out if the home page should be displayed.
     if($_REQUEST == NULL) {
//This line calls the home page method.
       $this->homepage();
//this line is an elseif that figures out which page type is requested.
     } elseif($_REQUEST['page'] == 'bankform') {
//This if statement figures out if this is a GET request, if it is not, it is a POST and must process the formdata.
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
//Because this is a get request, you have to display the form.
          $this->bankform();
        } else {
//because this is a post, you have to process the transaction, so instantiate an instantiate object.
          $transactions = new transactions();
//This line figures out if the form has more transactions by looking to see if the key exists in the POST request.
         if(array_key_exists('moretranstype', $_POST)) {
//This line adds the transaction data from the POST
           $transactions->addTransaction($_POST['type'],$_POST['amount'],$_POST['source']);
//This line is a PHP command that will forward the request back to the form.
           header('Location: http://www.mywebclass.org/gitexample/index.php?page=bankform');
//This else statement is run if there are no more transactions.
         } else {
//This adds the last transaction in the POST and then the next line prints the transactions;
           $transactions->addTransaction($_POST['type'],$_POST['amount'],$_POST['source']);
           $transactions->printTransactions();
         } 
       }   
    }  




    }
//this is the home page
    function homepage() {
      
      echo 'hello welcome to my program <br>';
      echo '<a href="./index.php?page=bankform">Click to View Bank Form</a>';

    }
//this displays the brain bank form, we could probably replace this by just displaying the form and not have it create the object.
    function bankform() {

       $form = new debitcredit();

       $form->printform();    
    }

  }

//This class manages the transactions
  class transactions {
//this array property contains the transactions;
    public $transactions = array();
     public function __construct() {
//this starts the session when the object is instantiated.
         session_start();

     }
//This is a method to add transactions;
     public function addTransaction($type, $amount, $source) {
//This creates a new transaction
       $transaction = new transaction();
//This sets the values for the transaction
       $transaction->setType($type);
       $transaction->setAmount($amount);
       $transaction->setSource($source);
//This loads the trnasaction in the the transactions array that is stored in the session.
       $_SESSION['transactions'][] = $transaction;
     } 
//This counts the transactions
     public function countTransactions() {
       $count = count($this->transactions);

       return $count;
     }

//This prints the transactions
    public function printTransactions() {
      foreach($_SESSION['transactions'] as $transaction) {
	$transaction->printTransaction();
      }
    }  
  
  }
//this is the transaction class, it is basiclly used to store the data.
  class transaction  {
    public $type;
    public $amount;
    public $source;
   
//These are seters for the transaction properties
    public function setType($type) {
      $this->type = $type;
    } 
    public function setAmount($amount) {
      $this->amount = $amount;
    }
    public function setSource($source) {
      $this->source = $source;
    }
 //These are getters for the transaction
    public function getType() {
      return $this->type;
    }
    public function getAmount() {
      return $this->amount;
    }
    public function getSource() {
      return $this->source;
    }
//This gets the whole transaction as an array
    public function getTransaction() {
      $transaction = array();
      $transaction['type'] = $this->type;
      $transaction['amount'] = $this->amount;
      $transaction['source'] = $this->source;
      return $transaction;
    }

//This prints the transaction
    public function printTransaction() {
      echo '<hr>'; 
      echo 'Transaction type: ' .   $this->type . "<br> \n";
      echo 'Transaction amount: ' . $this->amount . "<br> \n";
      echo 'Transaction source: ' . $this->source . "<br> \n"; 

    }

  }
 
//This is the debit credit form class that can print the form.
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
