<?php
//Pročitajte podatke iz datoteke polaznici.json
$polaznici = file_get_contents(__DIR__ . '/podaci/polaznici.json');

$polaznici = json_decode($polaznici_json, true);

echo '<table border="1">';
echo '<tr><th>Ime</th><th>Prezime</th><th>Godina rođenja</th></tr>';
foreach ($polaznici as $polaznik) {
    echo '<tr>';
    echo '<td>' . $polaznik['ime'] . '</td>';
    echo '<td>' . $polaznik['prezime'] . '</td>';
    echo '<td>' . $polaznik['godina_rodjenja'] . '</td>';
    echo '</tr>';
}
echo '</table>';

$new_polaznik = [
    "ime" => "Novo",
    "prezime" => "Polaznik",
    "godina_rodjenja" => 2000
];
$polaznici[] = $new_polaznik;

$updated_polaznici_json = json_encode($polaznici, JSON_PRETTY_PRINT);

$result = file_put_contents(__DIR__ . '/polaznici.json', $updated_polaznici_json);