<?php

var_dump(time());

$expiresIn = 1717693749 + 60;

setcookie('user', 'Tomislav', $expiresIn);