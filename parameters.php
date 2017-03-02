<?php

$answer = $_POST['cipher'];
$plaintext = (isset($_POST['plaintext'])) ? $_POST['plaintext'] : '';
$key = (isset($_POST['key'])) ? $_POST['key'] : 0;
$obfuscate = (isset($_POST['obfuscate'])) ? true : false;

if ($answer == 'caesar') {
    $ciphertext = caesar($plaintext, $key);
}
else {
    $ciphertext = vigenere($plaintext, $key);
}
