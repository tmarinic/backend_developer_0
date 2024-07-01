<?php

    //Definiranje varijabli a,b,c,d

    $a = 10;      
    $b = 5;        
    $c = "Marko";   
    $d = "Ivan";   

    //Aritmetički operatori
    echo $a - $b;
    echo '<br>';
    echo $a + $b;
    echo '<br>';
    echo $a * $b;
    echo '<br>';
    echo $a / $b;
    echo '<br>';
    echo $a % $b;
    echo '<br>';

    //Operatori onkatencije
    $f = $a.$b;
    echo $f;
    echo '<br>';

    //Kombinirani operatori
    echo $a += $b;
    echo '<br>';

    var_dump($a < $b);
    echo '<br>';

    //Operatori inkrementa
    echo ++$a;
    echo '<br>';
    echo --$b;

?>
