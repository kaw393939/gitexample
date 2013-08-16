<?php
ini_set('memory_limit', '-1');
$row = 1;
if (($handle = fopen("example.csv", "r")) !== FALSE) {
    while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
      if($row == 1) {
         $keys = $record;
         $row++;
         print_r($record);
      } else {
        $records[] = array_combine($keys, $record); 
      }
   
    }
    fclose($handle);
}

print_r($records);

?>
