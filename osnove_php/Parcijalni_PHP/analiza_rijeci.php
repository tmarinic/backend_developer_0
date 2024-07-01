<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Analizator Riječi</title>
</head>
<body>
<h2>Analizator Riječi</h2>
<form action="" method="POST">
    <label for="word">Upišite željenu riječ:</label><br>
    <input type="text" id="word" name="word" required><br><br>
    <input type="submit" value="Pošalji">
</form>

<?php
function countVowels($word) {
    // Uklanja brojeve prije brojanja i prebacuje riječ u mala slova
    $word = strtolower(preg_replace('/\d+/', '', $word));
    return preg_match_all('/[aeiou]/i', $word);
}

function countConsonants($word) {
    // Uklanja brojeve i prebacuje riječ u mala slova
    $cleanWord = strtolower(preg_replace('/\d+/', '', $word));
    // Broj suglasnika = broj slova - broj samoglasnika
    return strlen($cleanWord) - countVowels($word);
}

$filePath = 'words.json';  // Lokacija JSON datoteke

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['word'])) {
    $word = $_POST['word'];
    $totalCharacters = strlen($word); // Ukupan broj znakova
    $numVowels = countVowels($word);
    $numConsonants = countConsonants($word);

    
    $data = [
        "Riječ" => $word,
        "Broj znakova" => $totalCharacters,
        "Broj suglasnika" => $numConsonants,
        "Broj samoglasnika" => $numVowels
    ];

    // Učitavanje postojećih podataka i dodavanje novog unosa
    $words = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
    $words[] = $data;
    file_put_contents($filePath, json_encode($words, JSON_PRETTY_PRINT));

    echo "<table border='1'><tr><th>Riječ</th><th>Broj znakova</th><th>Broj suglasnika</th><th>Broj samoglasnika</th></tr>";
    foreach ($words as $word) {
        echo "<tr><td>{$word['Riječ']}</td><td>{$word['Broj znakova']}</td><td>{$word['Broj suglasnika']}</td><td>{$word['Broj samoglasnika']}</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>