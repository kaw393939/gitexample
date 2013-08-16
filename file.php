<?php 
  
$row = 1;
if (($handle = fopen("exampe.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
       $records[] = $data;
       
    }
    
    fclose($handle);
    
    //print_r($records);
} else {
  echo 'no file found or some error'	;
	
}

	
	


?>