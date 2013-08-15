<?php
$obj = new transactions();

print_r($obj);

class fileOperations {
  public $filename = 'file.csv';
  public $directory = 'uploads';

  public function __construct($filename = NULL, $directory = NULL) {
    if($filename != NULL) {
      $this->filename = $filename;
    }
    if(!is_null($directory)) { 
      $this->directory = $directory;
    }
  }

}

class transactions extends fileOperations {


}


?>
