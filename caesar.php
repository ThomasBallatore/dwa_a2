<?php

//require('toolsOriginal.php');

function caesar($plaintext, $key){

    $plaintext = (isset($_POST['plaintext'])) ? $_POST['plaintext'] : '';
    $key = (isset($_POST['key'])) ? $_POST['key'] : 0;
    $obfuscate = (isset($_POST['obfuscate'])) ? true : false;

    $key_norm = $key % 26;

    // iterates over all elements in plaintext
    for ($i = 0, $length = strlen($plaintext); $i < $length; $i++)
        {
            // checks if a given element is alphabetic
            if (ctype_alpha($plaintext[$i]))
            {
                // checks if a given element is upper case
                if (ctype_upper($plaintext[$i]))
                {
                    // overwrites the i-th element with a cipher value by:
                    // (0) using ord() to convert char to ascii value
                    // (1) subtracting 65 to "normalize" the upper case char to 0
                    // (2) adding the normalized key
                    // (3) taking the modulo 26 of that operation
                    // (4) adding 65 to restore the i-th ele. to proper ASCII value
                    // (5) using chr() to convert ascii value back to char
                    $plaintext[$i] = chr(((ord($plaintext[$i]) - 65 + $key_norm) % 26) + 65);
                }

                // checks if a given element is lower case
                if (ctype_lower($plaintext[$i]))
                {
                    // overwrites the i-th element with a cipher value by:
                    // (0) using ord() to convert char to ascii value
                    // (1) subtracting 97 to "normalize" the lower case char to 0
                    // (2) adding the normalized key
                    // (3) taking the modulo 26 of that operation
                    // (4) adding 97 to restore the i-th ele. to proper ASCII value
                    // (5) using chr() to convert ascii value back to char
                    $plaintext[$i] = chr(((ord($plaintext[$i]) - 97 + $key_norm) % 26) + 97);
                }
            }
        }
    $ciphertext = $plaintext;
    return $ciphertext;
}
