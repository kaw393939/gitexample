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
		}
	}
abstract class page {

	public $content = '';
	
		public function __construct() {
			if($_SERVER['REQUEST_METHOD'] == 'GET') {
				$this->get();
			} else {
				$this->post();
			}	
		}
		protected function get() {
	
		}
		protected function post() {
			print_r($_POST);
		}
		
		protected function menu_contents() {
			$this->content .= '<a href="page_class.php?class=form1">Form 1</a>' . "<br> \n";
			$this->content .= '<a href="page_class.php?class=form2">Form 2</a>' . "<br> \n";
			$this->content .= '<a href="page_class.php?class=xyz">XYZ Form</a>' . "<br> \n";
			$this->content .= '<a href="page_class.php">Homepage</a>' . "<br> \n";
			
		}
		
		public function __destruct() {
			echo $this->content;
		}
	}
	class form1 extends page {
		public function post() {
			echo 'Thank You ' . $_POST['firstname'] . ' ' . $_POST['lastname'];
		}
		public function get() {
			$this->page_title();
			$this->menu_contents();
			$this->show_form();
			
		}
		
		public function page_title() {
			
			$this->content .= '<h1>Form 1' . "</h1> \n";
		}
		
		public function show_form() {
			
			
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
				
			$this->content .= $form;
			
		}
		
	}
	class form2 extends page {
		public function get() {
			echo '<h1>form 2</h1>';
		}

	}
	
	class xyz extends page {
		public function get() {
			echo 'xyz' . "<br> \n";				
			$form = '<FORM action="page_class.php?class=xyz" method="post">
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
	
	
	
	
	
	class homepage extends page {}
?>