<?php
// File: dbsetup.php
// Purpose: initialize database handle ($db)
// Modified: lerman / 2016-04-28
$dbtype = 'pgsql'; $dbhost = 'localhost'; $dbname = 'koomen_db';
$dsn = "$dbtype:host=$dbhost;dbname=$dbname";
$dbuser = 'slerman'; $dbpass = 'gamelibrary';
try {
    $db = new PDO($dsn, $dbuser, $dbpass);
}
catch (PDOException $e) {
    print "DB Connection Error!: " . $e->getMessage();
die();
} ?>
