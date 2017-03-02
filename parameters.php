<?php

// sets choice of cipher to variable
$answer = $_POST['cipher'];

// sets and sanitizes plaintext and key inputs
$plaintext = (isset($_POST['plaintext'])) ? sanitize($_POST['plaintext']) : '';
$key = (isset($_POST['key'])) ? sanitize($_POST['key']) : 0;

// sets user display preference to variable
$obfuscate = (isset($_POST['obfuscate'])) ? true : false;

// applies the user-selected cipher
if ($answer == 'caesar') {
    $ciphertext = caesar($plaintext, $key);
}
else {
    $ciphertext = vigenere($plaintext, $key);
}
