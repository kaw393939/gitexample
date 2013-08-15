<?php

// instantiate the transaction
$obj = new transactions();
// look at transaction content
print_r($obj);
//define file operations
class fileOperations {
//public properties 
  public $filename = 'file.csv';
  public $directory = 'uploads';
//constructor that is detecting parameters and setting to null, if they are not being passed when the object is created
  public function __construct($filename = NULL, $directory = NULL) {

//testing to see if the parameter is null, if it is not null set the value
    if($filename != NULL) {
      $this->filename = $filename;
    }
//another form of the above if statement
    if(!is_null($directory)) { 
      $this->directory = $directory;
    }
  }

}
// this is the transactions class and it has a parent class of file operations that is defined above.
class transactions extends fileOperations {


}


?>
