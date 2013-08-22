<?php 
$transactions = new transactions();

$transactions->read_transactions();

	class file {	
		public $file_name = 'example.csv';
			
		protected function read_csv() {
			$first_run = TRUE;
			if (($handle = fopen($this->file_name, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
					if($first_run == TRUE) {
						$field_names = $this->create_field_names($data);
					    $first_run = FALSE;
					} else {
						$records[] = $this->create_record($data, $field_names);	
					}	
				} 
				fclose($handle);
				print_r($records);
		}
		}
		public function create_field_names($data) {
			
			return $data;
		}
		public function create_record($data, $field_names) {
				$data = array_combine($field_names, $data);
				return $data;
			}
			
			
		}
	
	
	
	
	class transactions extends file {
		
		public $file_name = 'transactions.csv';
		
		public function read_transactions() {
		   $this->read_csv();	
		 } 

		 
		}
		
	



?>

