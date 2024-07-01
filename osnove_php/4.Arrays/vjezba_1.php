<?php
    // Inicijalizacija praznog niza
    $primenumbers = [2, 3, 5, 7, 11]; 
    echo '<pre>';
    print_r( $primenumbers );
    echo '</pre>';

    $exist = isset($primenumbers[2]);
    var_dump($exist);
    echo '<br>';

    if ( 'exist' ) {
        echo 'Vrijednost trećeg elementa je: ', $primenumbers[2];
    } else {
        echo "Treći element u nizu ne postoji.";
    }
    echo '<br>';
    $primenumbers[] = 13;

    $brojElemenata = count($primenumbers);
    echo "Broj elemenata u nizu: " . $brojElemenata . "\n";

    echo '<pre>';
    print_r( $primenumbers );
    echo '</pre>'; 

    rsort($primenumbers);

    echo '<pre>';
    print_r( $primenumbers );
    echo '</pre>';


?>
