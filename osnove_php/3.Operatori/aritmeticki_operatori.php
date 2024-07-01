<?php
    $a = 15;
    $b = -5;
    // $c = $a - $b;

    echo $a - $b;
    echo '<br>';
    echo $a + $b;
    echo '<br>';
    echo $a * $b;
    echo '<br>';
    echo $a / $b;
    echo '<br>';

    // operator Modulo -> vraca ostatak od dijeljenja
    echo $a % $b;
    echo '<br>';
    echo 12 % 4;
    echo '<br>';
    echo 11 % 4; // 2*4=8 oststak dijeljenja je 3
    echo '<br>';

    // Operator spajanja stringova
    $a = 'Algebra - ';
    $b = 'PHP ';
    $c = 'Osnove';

    // Konkatenacija više stringova
    var_dump($a.$b.$c);
    echo '<br>';

    // Operator usporedbe
    var_dump($a > $b);
    ?>