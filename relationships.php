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
            <h2>Relationships</h2><hr>
            <?php

            try {
                $who = $_GET['who'];

                //customize details page
                if ($who == 'Sam'){
                    $attribute1 = $_GET['name'];
                    $attribute2 = $_GET['version'];

                    $users_platform = $db->prepare('SELECT players.name AS name FROM usersPlatform, players WHERE usersPlatform.plat_name=:name AND usersPlatform.plat_version=:version AND usersPlatform.player_id=players.id');
                    $users_platform->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $users_platform->bindValue(':version', $attribute2, PDO::PARAM_STR);
                    $users_platform->execute();

                    $runs_on = $db->prepare('SELECT game_name AS name FROM runsOn WHERE plat_name=:name AND plat_version=:version');
                    $runs_on->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $runs_on->bindValue(':version', $attribute2, PDO::PARAM_STR);
                    $runs_on->execute();

                    $develops_for = $db->prepare('SELECT developers.name AS name FROM developsFor, developers WHERE developsFor.plat_name=:name AND developsFor.plat_version=:version AND developsFor.developer_id=developers.id');
                    $develops_for->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $develops_for->bindValue(':version', $attribute2, PDO::PARAM_STR);
                    $develops_for->execute();

                    //display relationships
                    echo    '<div class="table-responsive list-table">',
                    '<table class="table table-striped table-hover">',
                    '<thead>',
                    '<tr>',
                    '<th>Entity Type</th>',
                    '<th>Entity</th>',
                    '<th>Relationship</th>',
                    '</tr>',
                    '</thead>',
                    '<tbody>';

                    while ($row = $users_platform->fetch()) {
                        echo        '<tr>',
                        '<td>Player</td>',
                        '<td>',$row->$name,' </td>',
                        '<td>Uses</td>',
                        '</tr>';
                    }

                    while ($row = $runs_on->fetch()) {
                        echo        '<tr>',
                        '<td>Game</td>',
                        '<td>',$row->$name,'</td>',
                        '<td>Runs On</td>',
                        '</tr>';
                    }

                    while ($row = $develops_for->fetch()) {
                        echo        '<tr>',
                        '<td>Developer</td>',
                        '<td>',$row->$name,'</td>',
                        '<td>Develops For</td>',
                        '</tr>';
                    }

                    echo            '</tbody>',
                    '</table>',
                    '</div>';
                }
                elseif ($who == 'Cinthia'){
                    $attribute1 = $_GET[''];
                    $attribute2 = $_GET[''];

                    $table = $db->prepare('');
                    $table->bindValue(':key1', $attribute1, PDO::PARAM_STR);
                    $table->bindValue(':key2', $attribute2, PDO::PARAM_STR);
                    $table->execute();
                }
                elseif ($who == 'Rodrigo'){
                    $attribute1 = $_GET[''];
                    $attribute2 = $_GET[''];

                    $table = $db->prepare('');
                    $table->bindValue(':key1', $attribute1, PDO::PARAM_STR);
                    $table->bindValue(':key2', $attribute2, PDO::PARAM_STR);
                    $table->execute();
                }
                elseif ($who == 'Lee'){
                    $attribute1 = $_GET[''];
                    $attribute2 = $_GET[''];

                    $table = $db->prepare('');
                    $table->bindValue(':key1', $attribute1, PDO::PARAM_STR);
                    $table->bindValue(':key2', $attribute2, PDO::PARAM_STR);
                    $table->execute();
                }
                else{

                }

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
