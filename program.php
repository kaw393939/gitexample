<?php
   
  $class = $_REQUEST['class'];
  $person = $_REQUEST['person']; 
  $program = new $class($person);

  class profile {
    public function __construct($person) {
      echo 'user profile ' . $person;
    }   

  }


  class program {
    public function __construct() {
      echo 'program';
    }

  }

  class spam {
   public function __construct() {
     echo 'spam';
   }

  }


?>
