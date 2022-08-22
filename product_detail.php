<?php require_once("configPosgresql.php"); ?>

    <?php $query = pg_query("SELECT * FROM product_add WHERE id = " . ($_GET['id']) . " ") or die("error");


          $row = pg_fetch_array($query);
          $id = $row["id"]; 
          $name = $row["name"];
          $description = $row["description"];    
          $price = $row["price"];
          if($row['image']!='images/cart.png'){
            $foto='./img/uploader/'.$row['image'];
            }
            else{
                $foto='images/'.$row['image'];
            }        

      ?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
            <h1><?php echo $row["name"]; ?></h1>

            <a href="product_detail.php?id={$id}"><img width='100' src="<?php echo $foto; ?>"></a>

            <h4 style="color: red;"><?php echo "&#36;" . $row["price"]; ?></h4>
            
            <a href="cart.php?add=<?php echo $row['id']; ?>" class="btn">Add To Cart</a>
            
            <h3>PRODUCT DESCRIPTION <i class="fa fa-indent"></i></h3>
            <br>
            <p><?php echo $row["description"]; ?></p>
        </div>
    </div>
</div>


