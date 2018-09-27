<?php

function mysql_escape_mimic($inp) {
    if (is_array($inp))
        return array_map(__METHOD__, $inp);

    if (!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
}

function encrypt($string, $key) {
    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
    return $string;
}

function decrypt($string, $key) {
    $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
    return $string;
}

function hashword($string, $salt) {
    $string = crypt($string, '$1$' . $salt . '$');
    return $string;
}

function injectionCheck($string) {
    $string = mysql_escape_mimic(trim(strip_tags(addslashes($string))));
    return $string;
}
