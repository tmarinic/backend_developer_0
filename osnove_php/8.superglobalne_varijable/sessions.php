<?php

session_start();

$_SESSION['user'] = [
        'ime' => 'Tomislav',
        'adresa' => 'Virovitica'
];
var_dump($_SESSION);
