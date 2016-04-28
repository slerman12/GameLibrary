<?php
// File: index.php
// Purpose: demo use of database handle ($db)
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

    <!-- BOOTSTRAP Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- BOOTSTRAP Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div class="gamelibrary-masthead">
    <div class="container">
        <nav class="gamelibrary-nav">
            <a class="gamelibrary-nav-item active" href="#">Game <i style="font-size: 18px;" class="fa fa-gamepad" aria-hidden="true"></i> Library  </a>
            <div class="pull-right">
                <a class="gamelibrary-nav-item" href="#">Sam's List</a>
                <a class="gamelibrary-nav-item" href="#">Cinthia's List</a>
                <a class="gamelibrary-nav-item" href="#">Rodrigo's List</a>
                <a class="gamelibrary-nav-item" href="#">Lee's List</a>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 gamelibrary-main">

            <div class="gamelibrary-post">
                <h2 class="gamelibrary-post-title"><i class="fa fa-home" aria-hidden="true"></i> Home Page</h2>
                <hr>
                <p>Gamelibrary description goes here. For best appearance, make it three paragraphs as shown here with this placeholder text. A few sentences per paragraph should be good, at around this length.</p>
                <hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <hr>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel by Sam Lerman, Cinthia Lages, Rodrigo Santiago, and Yuen Lee.</p>
            </div><!-- /.gamelibrary-post -->

        </div><!-- /.gamelibrary-main -->

        <div class="col-sm-3 col-sm-offset-1 gamelibrary-sidebar">
            <div class="sidebar-module">
                <h4>Lists</h4>
                <ol class="list-unstyled">
                    <li><a href="#">Sam - RelationName</a></li>
                    <li><a href="#">Cinthia - RelationName</a></li>
                    <li><a href="#">Rodrigo - RelationName</a></li>
                    <li><a href="#">Lee - RelationName</a></li>
                </ol>
            </div>
        </div><!-- /.gamelibrary-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="gamelibrary-footer">
    <p><a href="#">Project Design Document</a>.</p>
</footer>

</div>
</body>
</html>
