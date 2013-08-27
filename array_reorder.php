<?php 
$records = array();

$person1 = array('username' => 'jstevens', 'firstName' => 'joe', 'lastName' => 'stevens');
$person2 = array('username' => 'sstevens', 'firstName' => 'stan', 'lastName' => 'stevens');
$person3 = array('username' => 'lstevens', 'firstName' => 'lou', 'lastName' => 'stevens');
$person4 = array('username' => 'gstevens', 'firstName' => 'gary', 'lastName' => 'stevens');

$records[] = $person1;
$records[] = $person2;
$records[] = $person3;
$records[] = $person4;

function makePrimaryKey($key_name, $records) {	
	foreach($records as $record) {
		$index_name = $record[$key_name];
		unset($record[$key_name]);
		$new_records[$index_name] = $record;
	}
	
	return $new_records;
}
function removePrimaryKey($primary_key_name, $records) {
	$primary_keys = array_keys($records);
	foreach($primary_keys as $key => $value) {
		$primary_key = array($primary_key_name => $value);
		$record = $records[$value];		
		$new_records[] = array_merge($primary_key, $record);
		unset($records[$value]);
	}
	return $new_records;
}

$sorted_records = makePrimaryKey('username', $records);
$unsorted_records = removePrimaryKey('usernmame', $sorted_records);


print_r($sorted_records);
print_r($unsorted_records);


?>