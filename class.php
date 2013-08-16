<?php
$car = new car();
$car1 = new midsize();

$car2 = new fullsize();
$car3 = new sports();
print_r($car1);

print_r($car2);
print_r($car3);

abstract class car {
    private $size = '16 feet';
    protected $weight = '3000 lb';
    private $price = '10,000';
    private $doors = 'Four';
  }


  class midsize extends car {
    public function __construct() {
      $this->weight = '3500 lb';
    }

  }


  class fullsize extends car {}


  class sports extends car {

    public function __construct() {
      $this->doors = 'Two';
    }
  }



?>
