<?php
// File: list.php
// Purpose: lists
require_once ('./dbsetup.php');

//input validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
                <a class="gamelibrary-nav-item" href="./list.php?who=Sam">Platforms</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Cinthia">Developers</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Rodrigo">Players</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Lee">Games</a>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 list-main">

            <?php

            function insert($db)
            {
                if($who = 'Sam') {
                    $sql = "INSERT INTO platforms( name,
                                                version,
                                                type,
                                                speed,
                                                popularity) VALUES (
                                                :name,
                                                :version,
                                                :type,
                                                :speed,
                                                :popularity)";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam(':version', test_input($_POST['version']), PDO::PARAM_STR);
                    $stmt->bindParam(':type', test_input($_POST['type']), PDO::PARAM_STR);
                    $stmt->bindParam(':speed', test_input($_POST['speed']), PDO::PARAM_STR);
                    $stmt->bindParam(':popularity', test_input($_POST['popularity']), PDO::PARAM_STR);

                    $stmt->execute();
                }
                elseif($who == 'Cinthia'){
                    $sql = "INSERT INTO developers( name,
                                                country,
                                                year_founded) VALUES (
                                                :name,
                                                :country,
                                                :year_founded)";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam(':country', test_input($_POST['country']), PDO::PARAM_STR);
                    $stmt->bindParam(':year_founded', test_input($_POST['year_founded']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                elseif($who == 'Rodrigo'){
                    $sql = "INSERT INTO players( name,
                                                password,
                                                friends_count,
                                                game_hours) VALUES (
                                                :name,
                                                :password,
                                                :friends_count,
                                                :game_hours)";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam(':password', test_input($_POST['password']), PDO::PARAM_STR);
                    $stmt->bindParam(':friends_count', test_input($_POST['friends_count']), PDO::PARAM_STR);
                    $stmt->bindParam(':game_hours', test_input($_POST['game_hours']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                elseif($who == 'Lee'){
                    $sql = "INSERT INTO players( name) VALUES (
                                                :name)";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', test_input($_POST['name']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                else{

                }
            }

            function update($db)
            {
                if($who = 'Sam') {

                    $sql = "UPDATE platforms SET name = :name, version = :version, type = :type, speed = :speed, popularity = :popularity WHERE name=:nameOriginal AND version=:versionOriginal";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam('name',  test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam('version',  test_input($_POST['version']), PDO::PARAM_STR);
                    $stmt->bindParam('type', test_input($_POST['type']), PDO::PARAM_STR);
                    $stmt->bindParam('speed', test_input($_POST['speed']), PDO::PARAM_STR);
                    $stmt->bindParam('popularity', test_input($_POST['popularity']), PDO::PARAM_STR);
                    $stmt->bindParam('nameOriginal',  test_input($_POST['attribute1']), PDO::PARAM_STR);
                    $stmt->bindParam('versionOriginal',  test_input($_POST['attribute2']), PDO::PARAM_STR);

                    $stmt->execute();
                }
                elseif($who == 'Cinthia'){

                    $sql = "UPDATE developers SET name = :name, country = :country, year_founded = :year_founded WHERE name=:nameOriginal";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam('name',  test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam('country',  test_input($_POST['country']), PDO::PARAM_STR);
                    $stmt->bindParam('year_founded', test_input($_POST['year_founded']), PDO::PARAM_STR);
                    $stmt->bindParam('nameOriginal',  test_input($_POST['attribute1']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                elseif($who == 'Rodrigo'){

                    $sql = "UPDATE players SET name = :name, password = :country, friends_count = :friends_count, game_hours = :game_hours WHERE name=:nameOriginal";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam('name',  test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam('password',  test_input($_POST['password']), PDO::PARAM_STR);
                    $stmt->bindParam('friends_count', test_input($_POST['friends_count']), PDO::PARAM_STR);
                    $stmt->bindParam('game_hours', test_input($_POST['game_hours']), PDO::PARAM_STR);
                    $stmt->bindParam('nameOriginal',  test_input($_POST['attribute1']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                elseif($who == 'Lee'){

                    $sql = "UPDATE games SET name = :name WHERE name=:nameOriginal";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam('name',  test_input($_POST['name']), PDO::PARAM_STR);
                    $stmt->bindParam('nameOriginal',  test_input($_POST['attribute1']), PDO::PARAM_STR);

                    $stmt->execute();

                }
                else{

                }
            }

            try {
                $who = test_input($_GET['who']);

                //if insert or update
                if($_POST){

                    if(isset($_POST['insert'])){
                        insert($db);
                    }elseif(isset($_POST['update'])){
                        update($db);
                    }

                    if($who=='Sam') {
                        $attribute1 = test_input($_POST['name']);
                        $attribute2 = test_input($_POST['version']);
                    }
                    elseif($who=='Cinthia'){
                        $attribute1 = test_input($_POST['name']);
                        $attribute2 = test_input($_POST['country']);
                    }
                    elseif($who=='Rodrigo'){
                        $attribute1 = test_input($_POST['name']);
                        $attribute2 = test_input($_POST['password']);
                    }
                    elseif($who=='Lee'){
                        $attribute1 = test_input($_POST['name']);
                        $attribute2 = test_input($_POST['name']);
                    }
                    else{

                    }
                }
                else{
                    if($who=='Sam') {
                        $attribute1 = test_input($_GET['name']);
                        $attribute2 = test_input($_GET['version']);
                    }
                    elseif($who=='Cinthia'){
                        $attribute1 = test_input($_GET['name']);
                        $attribute2 = test_input($_GET['country']);
                    }
                    elseif($who=='Rodrigo'){
                        $attribute1 = test_input($_GET['name']);
                        $attribute2 = test_input($_GET['password']);
                    }
                    elseif($who=='Lee'){
                        $attribute1 = test_input($_GET['name']);
                        $attribute2 = test_input($_GET['name']);
                    }
                    else{

                    }
                }

                //customize details page
                if ($who == 'Sam'){
                    $detailsName = 'Platform Details';
                    $relation = 'platforms';

                    $tuple = $db->prepare('SELECT name, version, type, speed, popularity FROM platforms WHERE name=:name AND version=:version');
                    $tuple->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $tuple->bindValue(':version', $attribute2, PDO::PARAM_STR);
                    $tuple->execute();
                }
                elseif ($who == 'Cinthia'){
                    $detailsName = 'Developers';
                    $relation = 'developers';

                    $tuple = $db->prepare('SELECT name, country, year_founded FROM developers WHERE name=:name');
                    $tuple->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $tuple->execute();
                }
                elseif ($who == 'Rodrigo'){
                    $detailsName = 'Players';
                    $relation = 'players';

                    $tuple = $db->prepare('SELECT name, password, friends_count, game_hours FROM players WHERE name=:name');
                    $tuple->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $tuple->execute();
                }
                elseif ($who == 'Lee'){
                    $detailsName = 'Games';
                    $relation = 'games';

                    $tuple = $db->prepare('SELECT name FROM games WHERE name=:name');
                    $tuple->bindValue(':name', $attribute1, PDO::PARAM_STR);
                    $tuple->execute();
                }
                else{

                }

            }
            catch (PDOException $e) {
                print "DB Query Error : " . $e->getMessage();
                die();
            }

            echo '<div class="row"><div class="col-sm-6"><h2>', $detailsName, '</h2></div><div class="col-sm-6"><button data-toggle="modal" data-target="#updateModal" class=" pull-right update-button btn btn-success">Edit</button></div></div><hr>';

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

<!-- UPDATE MODAL -->
<div class="modal fade" id="updateModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Edit </h2>
            </div>
            <div class="modal-body">

                <?php
                    echo    '<form action="details.php?who=',$who,'" method="post"><div class="table-responsive list-table">',
                    '<table class="table table-striped table-hover">',
                    '<thead>',
                    '<tr>',
                    '<th>Key</th>',
                    '<th>Value</th>',
                    '</tr>',
                    '</thead>',
                    '<tbody>';
                    foreach($row as $key => $value) {
                        echo        '<tr>',
                        '<td>', $key, '</td>',
                        '<td><input type="text" value="',$value,'" name="',$key,'" class="form-control" id="',$key,'"></td>',
                        '</tr>';
                    }

                    echo            '</tbody>',
                    '</table>',
                    '</div>';
                echo '
                    <input type="hidden" name="attribute1" value="',$attribute1,'">
                    <input type="hidden" name="attribute2" value="',$attribute2,'">'
                ?>
                <input type="hidden" name="update" value="1">
                <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
