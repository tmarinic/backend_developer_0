<?php

function prettyPrint(array $print): void
{
    echo "<pre>";
    print_r($print);
    echo "</pre>";
}

const URL = 'https://www.hnb.hr/tecajn-eur/htecajn.htm'; //definiranje konstante URL sa tecajnom listom

$lista = file(URL); //dohvaćanje sadržaja tečajne liste


foreach($lista as $valutniRedak){ //prolazi kroz svaku liniju dok ne pronađe USD
    if (str_contains($valutniRedak, 'USD')) {
        break;
    }
}

$usdValues = explode('       ', $valutniRedak);

$usdSrednjiTecaj = floatval(str_replace(',', '.', $usdValues[2])); //pretvara srednji tečaj iz niza u decimalni broj, zamjenjuje zarez sa točkom

$convertedValue = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount_eur'])) { //ako je forma poslana dohvaca iznos u eurima pretvara u dec broj i izracunava iznos u USD
    $amountEur = floatval($_POST['amount_eur']);
    $convertedValue = $amountEur * $usdSrednjiTecaj;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tecajnica</title>
</head>
<body>
    <h1>Konverzija EUR u USD</h1>
    <form method="post" action="">
        <label for="amount_eur">Upišite iznos u €</label>
        <input type="text" id="amount_eur" name="amount_eur">
        <input type="submit" value="Convert">
    </form>

    <?php if ($convertedValue !== null): ?>
        <h2>Konvertirani iznos u $ = <?php echo number_format($convertedValue, 2); ?> </h2>
    <?php endif; ?>
</body>
</html>