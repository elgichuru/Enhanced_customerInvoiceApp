<?php
$dsn='mysql:host=localhost;dbname=my_guitar_shop1';
$username='Mutwiri';
$password='Reztraint@90!';



try{
    $db=new pdo($dsn,$username,$password);
} catch (PDOException $e) {

    $errormessage=$e->getmessage();
    include 'database_error.php';
    exit();
}



?>
