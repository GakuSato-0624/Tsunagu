<?php

function sanitize($before) {
    foreach($before as $key => $value) {
        $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); 
    }
    return $after;
}

function is_valid_email($email, $check_dns = false) {
    switch (true) {
        case false === filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE):
        case !preg_match('/@([^@\[]++)\z/', $email, $m):
            return false;

        case !$check_dns:
        case checkdnsrr($m[1], 'MX'):
        case checkdnsrr($m[1], 'A'):
        case checkdnsrr($m[1], 'AAAA'):
            return true;

        default:
            return false;
    }
}

function is_valid_phone_number($number) {
    return is_string($number) && preg_match('/\A\d{2,4}+-\d{2,4}+-\d{4}\z/', $number);
}


?>