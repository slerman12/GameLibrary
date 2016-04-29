<?php
// File: list.php
// Purpose: lists
require_once ('./dbsetup.php');

//create HTML table from a psql query ($table) with two attributes of your choice as columns
function createList($table, $attribute1, $attribute2){

    echo    '<div class="table-responsive list-table">',
                '<table class="table table-striped table-hover">',
                    '<thead>',
                    '<tr>',
                        '<th></th>',
                        '<th>',ucfirst($attribute1),'</th>',
                        '<th>', ucfirst($attribute2),'</th>',
                        '<th></th>',
                        '<th></th>',
                    '</tr>',
                    '</thead>',
                    '<tbody>';
    $i = 0;
    while (($row = $table->fetch()) && ($i < 15)) {
        echo        '<tr>',
                        '<td><a href="#"><i class="fa fa-times text-danger"></i></a></td>',
                        '<td>', $row->$attribute1, '</td>',
                        '<td>', $row->$attribute2, '</td>',
                        '<td><button type="button" class="btn btn-info btn-sm">Relationships</button></td>',
                        '<td><button type="button" class="btn btn-primary btn-sm">Details/Edit</button></td>',
                    '</tr>';
        $i++;
    }
    echo            '</tbody>',
                '</table>',
            '</div>';
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
            <button class="insert-button btn btn-success"><i class="fa fa-plus"></i></button>
            <?php

            // Select table query and display list
            try {
                $who = $_SERVER['QUERY_STRING'];
                if ($who == 'Sam'){
                    $table = $db->query('SELECT name, version, type, speed, popularity FROM platforms', PDO::FETCH_OBJ);
                    $attribute1 = 'name';
                    $attribute2 = 'version';
                    $listName = 'Platforms';
                    $listDesc = 'Search for platforms, view related entities, edit, or show details. Use the plus button to insert, the red X button to delete.';
                }
                elseif ($who == 'Cinthia'){
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = '';
                    $listDesc = '';
                }
                elseif ($who == 'Rodrigo'){
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = '';
                    $listDesc = '';
                }
                elseif ($who == 'Lee'){
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = '';
                    $listDesc = '';
                }
                else{

                }
            }
            catch (PDOException $e) {
                print "DB Query Error : " . $e->getMessage();
                die();
            }

            ?>
            <h2><?php echo $listName; ?></h2>
            <p><?php echo $listDesc; ?></p>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
            </div>
            <?php

                // Select table query and display list
                try {
                    createList($table, $attribute1, $attribute2);
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