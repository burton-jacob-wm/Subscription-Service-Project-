<?php
try {
    $dbc = new PDO('mysql:host=127.0.0.1;dbname=ramendb', 'root', 'root');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}