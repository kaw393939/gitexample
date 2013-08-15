<?php

$class1 = new MyClass;
$class2 = new OtherClass;

$class1->test($class2);


class MyClass {

 public function test(OtherClass $otherclass) {
        echo $otherclass->var;
    }

}

class OtherClass {
    public $var = 'Hello World';
}
?>
