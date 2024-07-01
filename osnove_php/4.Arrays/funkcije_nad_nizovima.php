<?php

$empty_array = [];
$names = ['Filip', 'Marko', 'Alex', 'Jura'];
$names2 = ['Ivan', 'Luka'];

// empty and isset funkcije
$is_variable_empty = empty($names);
var_dump($is_variable_empty);
echo '<br>';
var_dump(isset($empty_array));

// in_array and array_search funkcije
echo '<br>';
var_dump(in_array('Alex', $names));
echo '<br>';
var_dump(array_search('Alex', $names));

// sortiranje
sort($names);
rsort($names);
asort($names);
ksort($names);

echo '<pre>';
print_r($names);
echo '</pre>';

// push and pop and shift
array_push($names, 'Mosa');

echo '<pre>';
print_r($names);
echo '</pre>';

echo '<br>';
$last_element = array_pop($names);
echo $last_element;
echo '<br>';
echo '<pre>';
print_r($names);
echo '</pre>';

$first_value = array_shift($names);
echo $first_value;
echo '<br>';
echo '<pre>';
print_r($names);
echo '</pre>';

// array_keys, array_values and array_merge
var_dump(array_keys($names));
var_dump(array_values($names));
echo '<br>';
var_dump(count($names));

$merged = array_merge($names, $names2);
var_dump($merged);