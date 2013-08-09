<?php  
session_start();
if (!isset($_SESSION['count']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
  $transaction = array();
  $transaction['type'] = $_POST['trans_type'];
  $transaction['amount'] = $_POST['amount'];
  $_SESSION['transactions'][] = $transaction;
}

print_r($_SESSION);

echo $_SESSION['count'] . '<br>';

//session_destroy();


$form = '
<FORM action="form.php" method="post">
    <fieldset>
    <LABEL for="amount">Amount: </LABEL>
              <INPUT type="text" name="amount" id="lastname"><BR>
    <INPUT type="radio" name="trans_type" value="debt"> Debit<BR>
    <INPUT type="radio" name="trans_type" value="credit"> Credit<BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </fieldset>
 </FORM>';

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
     echo $form;
  } else {

     echo 'Thank you and this is what you sent: <br>';
     foreach($_POST as $key => $value) {
        echo $key . ': ' . $value . '<br>';
     }   
  }

?>














