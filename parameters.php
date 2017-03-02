<?php

$plaintext = (isset($_POST['plaintext'])) ? $_POST['plaintext'] : '';
$key = (isset($_POST['key'])) ? $_POST['key'] : 0;
$obfuscate = (isset($_POST['obfuscate'])) ? true : false;
// $caesar = (isset($_POST['caesar'])) ? true : false;
// $vigenere = (isset($_POST['vigenere'])) ? true : false;

if(isset($_POST['caesar'])) {
    $ciphertext = caesar($plaintext, $key);
}
else {
    $ciphertext = vigenere($plaintext, $key);
}
