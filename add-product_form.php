<?php
require 'database.php';
$query='select * from categories order by categoryID';
$statement=$db->prepare($query);
$statement->execute();
$categories=$statement->fetchall();
$statement->closecursor();
?>
<!<!doctype html>
<html>
    <head>
        <title>My guitar shop.</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="icon/x-image" href="main.css">
    </head>
    <body>
        <header><h1>Product Manager.</h1></header>
        <main>
            <h1>Add Product.</h1>
            
        </main>
    </body>
</html>