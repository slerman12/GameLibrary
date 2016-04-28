<?php
// File: index.php
// Purpose: demo use of database handle ($db)
require_once ('./dbsetup.php');
try {
    $rslt = $db->query('SELECT COUNT(*) FROM item');
    $cnt = $rslt ? $rslt->fetchColumn() : -1;
}
catch (PDOException $e) {
    print "DB Query Error : " . $e->getMessage();
    die();
}
?> <html>
   <head><title>DB Demo</title></head>
   <body>
      <p>There are <?= $cnt ?> tuples in the Wegmans ITEM table.</p>
   </body>
</html>
