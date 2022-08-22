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
	   <div>

	       <h2 style="text-align:center;font-size:300%;">All Products 1</h2>

	    </div>
	       
	   </div>   
           <div class="row" >				   		

              <?php get_products(); ?>
           </div>
           
</div>

	
