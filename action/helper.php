<?php
require_once  '../config.php';
function sanitize(string $var)
{
    return htmlspecialchars(stripslashes(trim($var)));
}

function con()
{
    return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}