<?php
//This is an example of type hinting, if you change the name of "OtherClass" to somethign else and create that as an object, you will not be able to pass it into the MyClass method "test".  This is because the test method checks to see if the object being passed in is of the class it defines.
$class1 = new MyClass;
$class2 = new dog;

$class1->test($class2);


class MyClass {
//"OtherClass" tells the function to only 
 public function test(dog $otherclass) {
        echo $otherclass->var;
    }

}

class dog {
    public $var = 'Hello World';
}
?>
