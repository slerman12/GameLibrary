<?php
// File: list.php
// Purpose: lists
require_once ('./dbsetup.php');

?> <html>
<head>
    <title>Game Library</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- BOOTSTRAP Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- BOOTSTRAP Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div class="gamelibrary-masthead">
    <div class="container">
        <nav class="gamelibrary-nav">
            <a class="gamelibrary-nav-item active" href="./index.php">Game <i style="font-size: 18px;" class="fa fa-gamepad" aria-hidden="true"></i> Library  </a>
            <div class="pull-right">
                <a class="gamelibrary-nav-item" href="./list.php?Sam">Sam's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?Cinthia">Cinthia's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?Rodrigo">Rodrigo's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?Lee">Lee's List</a>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 list-main">
            <?php

            $attribute1 = $_POST['attribute1'];
            $attribute2 = $_POST['attribute2'];

            // Select table query and display list
                        try {
                            $who = $_SERVER['QUERY_STRING'];
                            if ($who == 'Sam'){
                                $detailsName = 'Platform Details';
                                $tuple = $db->prepare('SELECT name, version, type, speed, popularity FROM platforms WHERE name=:name AND version=:version');
                                $tuple->bindValue(':name', $attribute1, PDO::PARAM_STR);
                                $tuple->bindValue(':version', $attribute2, PDO::PARAM_STR);
                                $tuple->execute();
                            }
                            elseif ($who == 'Cinthia'){
                            }
                            elseif ($who == 'Rodrigo'){
                            }
                            elseif ($who == 'Lee'){
                            }
                            else{

                            }
                        }
                        catch (PDOException $e) {
                            print "DB Query Error : " . $e->getMessage();
                            die();
                        }

            echo '<h2>', $detailsName, '</h2><hr>';

            // Show tuple
            try {
                echo    '<div class="table-responsive list-table">',
                '<table class="table table-striped table-hover">',
                '<thead>',
                '<tr>',
                '<th>Key</th>',
                '<th>Value</th>',
                '</tr>',
                '</thead>',
                '<tbody>';
                $row = $tuple->fetch(PDO::FETCH_OBJ);
                foreach($row as $key => $value) {
                    echo        '<tr>',
                    '<td>', $key, '</td>',
                    '<td>', $value, '</td>',
                    '</tr>';
                }

                echo            '</tbody>',
                '</table>',
                '</div>';
            }
            catch (PDOException $e) {
                print "DB Query Error : " . $e->getMessage();
                die();
            }

            ;?>
        </div>

    </div><!-- /.row -->

</div><!-- /.container -->

</div>
</body>
</html>
