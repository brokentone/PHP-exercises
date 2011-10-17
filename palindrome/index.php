<?php

$sample_array = array('racecar','test','tattarrattat','kenton');
$sample = 'racecar';

function palindrome_rec($input = '') {
	if($input == '' || strlen($input) == 1) return true;
	else {
		if($input[0] == $input[strlen($input)-1]) {
			$input = substr($input, 1, -1);
			return palindrome_rec($input);
		} else {
			return false;
		}
	}
}

function palindrome_loop($input) {
	$length = strlen($input);
	for($i=0;$i<floor($length/2);$i++) {
		if($input[$i] != $input[$length-1-$i]) {
			return false;
		}
	}
	return true;
}

function palindrome_rev($str) {
  if ($str == strrev($str))
    return true;
  return false;
}

//print $sample;
/*
foreach($sample_array as $val) {
	print $val;
	if(palindrome_loop($val)) print " is a palindrome\n" . PHP_EOL;
	else print " is not a palindrome\n" . PHP_EOL;
}
*/
$start1 = microtime(true);
for($i=0;$i<10000;$i++) {
	foreach($sample_array as $val) {
		palindrome_loop($val);
	}
}
$end1 = microtime(true);
echo 'test';

$start2 = microtime(true);
for($i=0;$i<10000;$i++) {
	foreach($sample_array as $val) {
		palindrome_rec($val);
	}
}
$end2 = microtime(true);

$start3 = microtime(true);
for($i=0;$i<10000;$i++) {
	foreach($sample_array as $val) {
		palindrome_rev($val);
	}
}
$end3 = microtime(true);

print $end1 - $start1 . PHP_EOL;
print $end2 - $start2 . PHP_EOL;
print $end3 - $start3 . PHP_EOL;