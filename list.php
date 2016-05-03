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
?>
<html>
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
<script>
    //delete
    $(document).ready(function() {
        $('.deleteBtn').click(function() {
            if (confirm('Are you sure?')) {
                $(this).submit();
            }
        });
    });
</script>
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
            <button data-toggle="modal" data-target="#insertModal" class="insert-button btn btn-success"><i class="fa fa-plus"></i></button>
            <?php
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
                while ($row = $table->fetch(PDO::FETCH_OBJ)) {
                    echo        '<tr>',
                    '<td><form class="deleteBtn" style="margin:0; padding:0;" action="list.php?who=',$_GET['who'],'" method="post"><input type="hidden" name="delete" value="1"><input type="hidden" name="',$attribute1,'" value="',$row->$attribute1,'"><input type="hidden" name="',$attribute2,'" value="',$row->$attribute2,'"><i class="fa fa-times text-danger"></i></form></td>',
                    '<td>', $row->$attribute1, '</td>',
                    '<td>', $row->$attribute2, '</td>',
                    '<td><form style="margin:0; padding:0;" action="relationships.php" method="get"><input type="hidden" name="who" value="',$_GET['who'],'"><input type="hidden" name="',$attribute1,'" value="',$row->$attribute1,'"><input type="hidden" name="',$attribute2,'" value="',$row->$attribute2,'"><button type="submit" class="btn btn-info btn-sm">Relationships</button></form></td>',
                    '<td><form style="margin:0; padding:0;" action="details.php" method="get"><input type="hidden" name="who" value="',$_GET['who'],'"><input type="hidden" name="',$attribute1,'" value="',$row->$attribute1,'"><input type="hidden" name="',$attribute2,'" value="',$row->$attribute2,'"><button type="submit" class="btn btn-primary btn-sm">Details/Edit</button></form></td>',
                    '</tr>';
                    $i++;
                }
                echo            '</tbody>',
                '</table>',
                '</div>';
            }

            function delete($db)
            {
                if($who = 'Sam') {
                    $sql = "DELETE FROM platforms WHERE name=:name AND
                                                version=:version";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
                    $stmt->bindParam(':version', $_POST['version'], PDO::PARAM_STR);
                    $stmt->execute();
                }
                elseif($who == 'Cinthia'){

                }
                elseif($who == 'Rodrigo'){

                }
                elseif($who == 'Lee'){

                }
                else{

                }
            }

            $who = test_input($_GET['who']);

            try {
                //delete if called
                if($_POST){
                    if(isset($_POST['delete'])){
                        delete($db);
                    }
                }

                // Select table query and display customized list
                if ($who == 'Sam'){
                    $relation = 'platforms';
                    if(isset($_GET['search'])){
//                        $search = test_input($_GET['search']);
//                        $stmt = 'SELECT name, version, type, speed, popularity FROM platforms WHERE name = '.$search.' OR version = '.$search.' OR type = '.$search.' OR speed = '.$search.' OR popularity = '.$search.' ORDER BY popularity DESC';
//                        $table = $db->query($stmt);
                        $table = $db->prepare("SELECT name, version, type, speed, popularity FROM platforms WHERE (LOWER(:search) ILIKE '%' || LOWER(name) || '%') OR (LOWER(:search) ILIKE '%' || LOWER(version) || '%') OR (LOWER(:search) ILIKE '%' || LOWER(type) || '%') OR (LOWER(:search) ILIKE LOWER(speed::text)) OR (LOWER(:search) ILIKE LOWER(popularity::text)) ORDER BY popularity DESC");
                        $table->bindValue(':search', test_input($_GET['search']), PDO::PARAM_STR);
                        $table->execute();
                    }else{
                        $table = $db->query('SELECT name, version, type, speed, popularity FROM platforms ORDER BY popularity DESC LIMIT 15');
                    }
                    $attribute1 = 'name';
                    $attribute2 = 'version';
                    $listName = 'Platforms';
                    $listDesc = 'Search for platforms, view related entities, edit, or show details. Use the plus button to insert, the red X button to delete. <strong>Below are the 15 most popular.</strong>';
                }
                elseif ($who == 'Cinthia'){
                    $relation = '';
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = 'Cinthia';
                    $listDesc = 'Did not contribute to coding website. See project design document. See Sams list for a complete list with full functionality.';
                }
                elseif ($who == 'Rodrigo'){
                    $relation = '';
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = 'Rodrigo';
                    $listDesc = 'Did not contribute to coding website. See project design document. See Sams list for a complete list with full functionality.';
                }
                elseif ($who == 'Lee'){
                    $relation = '';
                    $table = $db->query('');
                    $attribute1 = '';
                    $attribute2 = '';
                    $listName = 'Lee';
                    $listDesc = 'Did not contribute to coding website. See project design document. See Sams list for a complete list with full functionality.';
                }
                else{

                }
            }
            catch (PDOException $e) {
                print "DB Query Error : " . $e->getMessage();
                die();
            }

            //search bar
            echo '<h2>',$listName,'</h2>
            <p>',$listDesc,'</p>
            <form style="margin: 0; padding: 0;" action="list.php" method="get">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="hidden" name="who" value="',$who,'">
                        <input type="text" name="search" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                    </div>
                </div>
            </form>';

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

<!-- INSERT MODAL -->
<div class="modal fade" id="insertModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Insert </h2>
            </div>
            <div class="modal-body">

                <?php
                $stmt = 'SELECT * FROM '.$relation.' LIMIT 0';
                $rs = $db->query($stmt);

                for ($i = 0; $i < $rs->columnCount(); $i++) {
                    $col = $rs->getColumnMeta($i);
                    $columns[] = $col['name'];
                }
                echo '<form style="margin:0; padding:0;" action="details.php?who=',$who,'" method="post">
                        <input type="hidden" name="insert" value="2">';
                foreach($columns as $key){
                    echo '<div class="form-group row">
                            <label for="',$key,'" class="col-sm-3 control-label">',$key,'</label>
                        <div class="col-sm-9">
                            <input type="text" name="',$key,'" class="form-control" id="',$key,'">
                        </div>
                        </div>';
                }
                ?>
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
