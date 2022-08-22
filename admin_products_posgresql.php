<?php require_once("config.php"); ?>


    <?php include("admin_header.php") ?>

    <?php include("sidebar.php") ?>

        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <header class="w3-container" style="padding-top:22px">

  </header>

  <div class="w3-container">
  	<h3 class="bg"><?php require('./functions.php');  display_message();?></h3>
  	<h3> Products </h3>
  </div>

  <table class="table table-striped">
    <thead class="table-dark">
       <tr>
           <th>ID</th>
           <th>Producto</th>
           <th>Name</th>
           <th>Price</th>
           <th>Description</th>
           <th>Create Date</th>
           <th>Action</th>
    </thead>

    <tbody>

       </tr>
            <?php get_products_admin_page_postgresql(); ?>
    </tbody>

       
   </table>