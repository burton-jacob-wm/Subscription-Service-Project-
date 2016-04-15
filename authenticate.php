<?php
$user = 'admin';
$password = 'ramenking';

if (!isset($_SERVER['PHP_AUTH_USER'] ) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $user) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm=Ramen It Over Admin');
    exit('<h2>Authentication Error - </h2><hr />Sorry, you must enter a valid username and password to access this page.');
};