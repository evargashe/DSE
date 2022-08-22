<?php require_once("./config.php"); ?>

    
    <?php #$query = pg_query("SELECT * FROM product_add WHERE id = " . ($_GET['id']) . " ") or die("error");

    $ids = $models->execute_kw($db, $uid, $password, 'product.template', 'search', array(array(array('id', '=', ($_GET['id'])))));
    $records = $models->execute_kw($db, $uid, $password, 'product.template', 'read', array($ids),array('fields' => array('id','name','standard_price','description')));
    foreach ($records as $a){
         
    
     

      ?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details 1</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include("navbar.php") ?>

       
<div class="small-container single-product">
    <div class="row">


        <div class="col-2">
        </div>
        <div class="col-2">
            <h1><?php echo $a["name"]; ?></h1>

            <a href="product_detail1.php?id={$id}"><img width='100' src="./images/cart.png"></a>

            <h4 style="color: red;"><?php echo "&#36;" . $a["standard_price"]; ?></h4>
            
            <a href="cart.php?add=<?php echo $a['id']; ?>" class="btn">Add To Cart</a>
            
            <h3>PRODUCT DESCRIPTION <i class="fa fa-indent"></i></h3>
            <br>
            <p><?php echo $a["description"]; ?></p>
        </div>
        <?php }?>
    </div>
</div>


