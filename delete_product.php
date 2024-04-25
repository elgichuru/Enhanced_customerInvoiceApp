<?php

require_once 'database.php';

//Get values for product_id and category_id
$product_id= filter_input(INPUT_POST,'product_id',FILTER_VALIDATE_INT);
$category_id=filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);

if($product_id!=false && $category_id!=false){
    $query='DELETE from products where productID=:product_id';
    $statement=$db->prepare($query);
    $statement->bindvalue(':product_id',$product_id);
    $success=$statement->execute();
    $statement->closecursor();
}
//display the product list page

include 'index.php';

?>

