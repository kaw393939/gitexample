<?php 
  
$first_run = TRUE;
if (($handle = fopen("example.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
       if($first_run == TRUE) {
       	$field_names = $data;
       	$first_run = FALSE;
       } else {
       	$data = array_combine($field_names, $data);
       	$records[] = $data;
       }
      
    }
    	     
    
    
    fclose($handle);
    //print_r($field_names);
    print_r($records);
} else {
  echo 'no file found or some error'	;
	
}

	
	


?>