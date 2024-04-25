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
            <form action="add_product.php" method="POST" id="add_product_form">
                <label>category:</label>
                <select name="category_id">
                    <?php foreach($categories as $category): ?>
                    <option value="<?php $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label>Code:</label>
                <input type="text" name="code"><br>
                <label>Name:</label>
                <input type="text" name="name"><br>
                <label>List Price:</label>
                <input type="text" name="Price"><br>
                <label>&nbsp;</label>
                <input type="submit" value="Add Product">
            </form>
            <a href="index.php">View Product List</a>
        </main>
        <footer>
            <p>&copy;<?php echo date("Y"); ?>My Guitar shop,Inc.</p>
        </footer>
    </body>
</html>