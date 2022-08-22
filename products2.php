<?php require_once("config.php"); require_once("functions.php")?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	    <?php include("navbar.php") ?>
	</div>

	<div class="small-container">
		<div class="row row-2">
			
		</div>
	   <div class="row row-2">

	       <h2 style="text-align:center;font-size:300%;">All Products 2</h2>
	    <div class="row">
	       	<div class="col" style="padding-right: 50px;">
	       		<form class="" action="" method="get" enctype="multipart/form-data">
	       			<div class="form-group">
			       		<input type="text" name="busqueda" placeholder="Search">
			       	</div>
			       	<div class="form-group">
			       		<input type="submit" name="search_product" class="btn btn-primary" value="Search">
			       	</div>
			    </form>
	       	</div>
	    </div>
	       </div>
	       
           <?php 
                if(isset($_GET['search_product']))
                {

                        $busqueda=$_GET['busqueda'];
                        require_once ("./configPosgresql.php");
                        $query =pg_query("SELECT *FROM product_add where name like '%$busqueda%'");
                        if (!$query) {
                            echo "Ocurrió un error.\n";
                            exit;
                        }
    


?>

	   </div>   
           <div class="row" >				   		
			  <?php 
    
                while ($row = pg_fetch_array($query)) {
                    
                    if($row['image']!='./images/cart.png'){
                        $foto='./img/uploader/'.$row['image'];
                    }
                    else{
                        $foto='images/'.$row['image'];
                    }
                    $product = <<<DELIMETER
                        <div class="col-4">
                            <a href="product_detail.php?id={$row['id']}"><img width='70' src="{$foto}"></a>
                            <h4><a href="product_detail.php?id={$row['id']}">{$row['name']}</a></h4>
                            <p style="color: red;">&#36;{$row['price']}</p>
                            <a class="btn" href="cart.php?add={$row['id']}">Add to cart</a>
                        </div>
                    DELIMETER;

                    echo $product;

                }  
           }     
              ?>
           </div>
           
</div>

	
