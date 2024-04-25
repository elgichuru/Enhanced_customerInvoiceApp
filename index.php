<?php
require_once 'database.php';

//get category id
if(!isset($category_id)){
    $category_id=filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
    if ($category_id==null||$category_id==false){
        $category_id=1;
    }
}
//get name for selected category
        $querycategory='select * from categories where categoryID=:category_id';
            $statemnet1=$db->prepare($querycategory);
            $statemnet1->bindvalue(':category_id',$category_id);
            $statement1->execute();
            $category=$statement1->fetch();
            $category_name=$category['categoryName'];
            $statement1.closecursor();
        
            //get all categories
            $queryAllcategories='select * from categories';
            $statement2=$db->prepare($queryAllcategories);
            $statement2->execute();
            $categories=$statement2->fetchall();
            $statement2->closecursor();
            
            //get products for selected category
            $queryproducts='select * from products where categoryID=:category_id order by productID';
            $statement3=$db->prepare($queryproducts);
            $statement3->bindvalue(':category_id',$category_id);
            $statement3->execute();
            $products=$statement3->fetchall();
            $statement3->closecursor();
?>

<!doctype html>
<html>
    <head>
        <title>My guitar shop.</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="icon/x-image" href="favico.ico">
    </head>
    <!-----body section-------->
    <body>
        <header><h1>product Manager.</h1></header>
        <main>
            <h1>Product List.</h1>
            <aside>
                <nav>
                    <ul>
                        <?php foreach($categories as $category): ?>
                        <li>
                            <a href=".?category_id=<?php $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <section>
                <h1><?php echo $category_name; ?></h1>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th class="right">Price</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo $product['productCode']; ?></td>
                        <td><?php echo $product['productName']; ?></td>
                        <td class="right"><?php echo $product['listPrice']; ?></td>
                        <td><form action="delete_product.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                                <input type="submit" value="Delete">
                            </form></td>                   
                    </tr>
                    <?php endforeach; ?>
                </table>
                <p><a href="add_product_form.php">Add product</a></p>
            </section>
        </main>
        <footer>
            <p>&copy;<?php echo date("y"); ?>My guitar Shop, Inc.</p>
        </footer>
    </body>
</html>