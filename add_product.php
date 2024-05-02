<?php
//get product data
$category_id=filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
$code= filter_input(INPUT_POST, 'code');
$name=filter_input(INPUT_POST,'name');
$price=filter_input(INPUT_POST,'price',FILTER_VALIDATE_FLOAT);

//validate inputs
if($category_id == null || $category_id == false || $code == null || $name == null || $price == null || $price == false){
    $error="Invalid product data. Check all fields and try again.";
    include 'error.php';
    
} else {
    require_once 'database.php';
    //add products to the databse
    $query='insert into products(categoryID,productCode,productName,listPrice) '
            . 'values(:category_ID,:code,:name,:price)';
    $statement1->bindvalue(':category_ID',$category_id);
    $statement1->bindvalue(':code',$code);
    $statement1->bindvalue(':name',$name);
    $statement1->bindvalue(':price',$price);
    $statement1->execute();
    $statement1->closecursor();
    
    //display the product list page
    include 'index.php';
    
}
    



?>
