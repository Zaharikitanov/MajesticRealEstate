<?php

require_once dirname(__FILE__) . "/globals.php";

function getUserToken($cookie_name) {
    if (!isset($_COOKIE[$cookie_name])) {
        header("Location: " . ROOT . "/unautorized.php");
        die();
    }
}
