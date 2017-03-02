<?php

include_once('toolsOriginal.php');

function vigenere($plaintext, $key){

    // sets and sanitizes plaintext and key inputs
    $plaintext = (isset($_POST['plaintext'])) ? sanitize($_POST['plaintext']) : '';
    $key = (isset($_POST['key'])) ? sanitize($_POST['key']) : 0;

    $obfuscate = (isset($_POST['obfuscate'])) ? true : false;

    # MAIN BODY OF PROGRAM

    # initializes a counter k for looping through elements of the key
    $k = 0;

    # initializes an empty string into which individual characters of
    # plaintext will be concatenated below
    $plaintext_new = '';

    # iterates over all elements in plaintext
    for ($i = 0, $length = strlen($plaintext); $i < $length; $i++)
    {
        # checks if a given element is alphabetic
        if (ctype_alpha($plaintext[$i]))
        {
            # sets value of an integer variable key_int to the ascii value
            # of the element of the key determined by the remainder of k
            # divided by the length of key
            # ensures that the key values can cycle back to the start of the
            # key if the plaintext is longer than the key
            $key_int = ord($key[$k % strlen($key)]);

            // $x = ord($key[$k % strlen($key)]);

            # if a given element is upper case, subtracts 65 to "normalize"
            if ($key_int >= 65 && $key_int <= 90)
            {
                $key_int -= 65;
            }

            # if a given element is lower case, subtracts 97 to "normalize"
            if ($key_int >= 97 && $key_int <= 122)
            {
                    $key_int -= 97;
            }

            # checks if a given element of plaintext is upper case
            if (ctype_upper($plaintext[$i]))
            {
                # concatenates the i-th char with a cipher value by:
                # (0) using ord() to convert char to ascii value
                # (1) subtracting 65 to "normalize" the upper case char to 0
                # (2) adding the normalized key
                # (3) taking the modulo 26 of that operation
                # (4) adding 65 to restore the i-th char to proper ASCII value
                # (5) using chr() to convert ascii value back to char
                $plaintext_new .= chr((((ord($plaintext[$i]) - 65 + $key_int) % 26) + 65));
            }

            # checks if a given element of plaintext is lower case
            if (ctype_lower($plaintext[$i]))
            {
                # concatenates the i-th char with a cipher value by:
                # (0) using ord() to convert char to ascii value
                # (1) subtracting 97 to "normalize" the lower case char to 0
                # (2) adding the normalized key
                # (3) taking the modulo 26 of that operation
                # (4) adding 97 to restore the i-th char to proper ASCII value
                # (5) using chr() to convert ascii value back to char
                $plaintext_new .= chr((((ord($plaintext[$i]) - 97 + $key_int) % 26) + 97));
            }

            # increments k by 1
            # NOTE: k is only incremented for plaintext[i] that are alphabetic
            $k += 1;

        # concatenates non-alphabetic elements
        }
        else
        {
            $plaintext_new .= chr(ord($plaintext[$i]));
        }
    }
    $ciphertext = $plaintext_new;
    return $ciphertext;
}
