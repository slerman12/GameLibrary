<?php
// File: list.php
// Purpose: lists
require_once ('./dbsetup.php');
try {
    $rslt = $db->query('SELECT COUNT(*) FROM items');
    $cnt = $rslt ? $rslt->fetchColumn() : -1;
}
catch (PDOException $e) {
    print "DB Query Error : " . $e->getMessage();
    die();
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
                <a class="gamelibrary-nav-item" href="./list.php?who=Sam">Sam's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Cinthia">Cinthia's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Rodrigo">Rodrigo's List</a>
                <a class="gamelibrary-nav-item" href="./list.php?who=Lee">Lee's List</a>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 list-main">
            <button class="insert-button btn btn-success"><i class="fa fa-plus"></i></button>
            <h2>Platforms</h2>
            <p>Search for platforms, view related entities, edit, or show details. Use the plus button to insert, the red X button to delete.</p>
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
            <div class="table-responsive list-table">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Version</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="#"><i class="fa fa-times text-danger"></i></a></td>
                        <td>Windows</td>
                        <td>2.0</td>
                        <td><button type="button" class="btn btn-info btn-sm">Relationships</button></td>
                        <td><button type="button" class="btn btn-primary btn-sm">Details/Edit</button></td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="fa fa-times text-danger"></i></a></td>
                        <td>iOS</td>
                        <td>1.001</td>
                        <td><button type="button" class="btn btn-info btn-sm">Relationships</button></td>
                        <td><button type="button" class="btn btn-primary btn-sm">Details/Edit</button></td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="fa fa-times text-danger"></i></a></td>
                        <td>Linux Debian</td>
                        <td>10</td>
                        <td><button type="button" class="btn btn-info btn-sm">Relationships</button></td>
                        <td><button type="button" class="btn btn-primary btn-sm">Details/Edit</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- /.row -->

</div><!-- /.container -->

</div>
</body>
</html>
