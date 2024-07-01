<?php
// Definiranje niza
$users = [
    ["Ime" => "Max", "Prezime" => "Verstappen", "Godine" => 26, "Spol" => "M"],
    ["Ime" => "Sergio  ", "Prezime" => "Perez", "Godine" => 34, "Spol" => "M"]
];

echo '<pre>';
print_r($users);
echo '</pre>';

// unset($users[0]['spol']);
// unset($users[1]['spol']);

foreach ($users as $key => $user) {
    unset($users[$key]['spol']);
}
echo '<pre>';
print_r($users);
echo '</pre>';