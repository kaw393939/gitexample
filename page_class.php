<?php 
$obj = new program();

	class program {
		public function __construct() {		
			if(isset($_REQUEST['class'])) {
				$class = $_REQUEST['class'];
				$obj = new $class();
			} else {	
				$obj = new homepage();
			}
			print_r($_REQUEST);
		}
	}
	class page {	
		public function __construct() {
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				$this->get();
			} else {
				$this->post();
			}	
		}
		protected function get() {
			echo '<a href="page_class.php?class=form1">Form 1</a>' . "<br> \n";
			echo '<a href="page_class.php?class=form2">Form 2</a>' . "<br> \n";	
		}
		protected function post() {
			print_r($_POST);
		}
	}
	class form1 extends page {
		public function get() {
			echo 'Form 1' . "<br> \n";
			echo '<a href="page_class.php?class=form1">Form 1</a>' . "<br> \n";
			echo '<a href="page_class.php?class=form2">Form 2</a>' . "<br> \n";
			echo '<a href="page_class.php">Homepage</a>' . "<br> \n";
			
			$form = '<FORM action="page_class.php?class=form1" method="post">
    					 <P>
   					 <LABEL for="firstname">First name: </LABEL>
             		 <INPUT type="text" name="firstname" id="firstname"><BR>
    					 <LABEL for="lastname">Last name: </LABEL>
              		 <INPUT type="text" name="lastname" id="lastname"><BR>
    					 <LABEL for="email">email: </LABEL>
                     <INPUT type="text" name="email"id="email"><BR>
                     <INPUT type="submit" value="Send"> <INPUT type="reset">
                     </P>
                     </FORM>';
			
			echo $form;
			
		}	
		
	}
	class form2 extends page {
		public function __construct() {
			echo 'Form 2' . "<br> \n";
			echo '<a href="page_class.php?class=form1">Form 1</a>' . "<br> \n";
			echo '<a href="page_class.php?class=form2">Form 2</a>' . "<br> \n";
			echo '<a href="page_class.php">Homepage</a>' . "<br> \n";
		}
	}
	class homepage extends page {}
?>