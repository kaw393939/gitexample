<?php
$first_run = TRUE;
if (($handle = fopen("example.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
    if ($first_run == TRUE) {
      $field_names = $data;
      $first_run   = FALSE;
    } //$first_run == TRUE
    else {
      $data      = array_combine($field_names, $data);
      $records[] = $data;
    }
  } //($data = fgetcsv($handle, 0, ",")) !== FALSE
  fclose($handle);
  //print_r($field_names);
  // print_r($records);
  echo '<table border="1">';
  $row = 0;
  foreach ($records as $record) {
    $heading = array_keys($record);
    echo '<tr>';
    if ($row == 0) {
      foreach ($heading as $key => $value) {
        echo '<th>' . $value . '</th>';
        $row++;
      } //$heading as $key => $value
      echo '</tr>';
      foreach ($record as $key => $value) {
        echo '<td>' . $value . '</td>';
      } //$record as $key => $value
      echo '</tr>';
    } //$row == 0
    else {
      foreach ($record as $key => $value) {
        echo '<td>' . $value . '</td>';
      } //$record as $key => $value
      echo '</tr>';
    }
  } //$records as $record
  echo '</table>';
} //($handle = fopen("example.csv", "r")) !== FALSE
else {
  echo 'no file found or some error';
}
?>