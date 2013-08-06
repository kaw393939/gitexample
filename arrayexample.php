<?php 
  
  $record = array();
  $record['first_name'] = 'Keith';
  $record['last_name'] = 'Williams';
  $record['middle_name'] = 'Allison';

 // print_r($record);

  $records = array();

  $records = $record;
  $record = array();
  $record['first_name'] = 'Noam';
  $record['last_name'] = 'Lustiger';
  $records[] = $record;
  $record['first_name'] = 'Steve';
  $record['last_name'] = 'Josephs';
  $records[] = $record;

  print_r($records);


?>
