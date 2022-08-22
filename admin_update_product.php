<?php require_once("config.php"); require_once("./configPosgresql.php"); require_once("./functions.php");?>

<?php 
  $foto = '';
  if(isset($_GET['id'])) {
    $query = pg_query("SELECT * FROM product_add WHERE id = " . ($_GET['id']) . " ");
    confirm($query);
    
    while($row = pg_fetch_array($query)) {

      $name = ($row['name']);
      $price = ($row['price']);
      $description = ($row['description']);
      if($row['image']!='./images/cart.png')
			{
				$foto= '<img id="img" src="./img/uploader/'.$row['image'].'" alt="Producto">';
			}

    }
    update_product_admin();
  }

?>



    <?php include("admin_header.php") ?>

    <?php include("sidebar.php") ?>

        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <header class="w3-container" style="padding-top:22px">

  </header>

  <div class="w3-container">
  	<h3 class="bg"><?php display_message();?></h3>
  	<h3> Update Product </h3>
    <hr style="border-color: black;">
  </div>

          
           <div class="col-2" style="padding-left: 20px;">

              <div class="form-container2">
                 <div class="form-btn">
                 </div>
                 
                 <form class="" action="" method="post" enctype="multipart/form-data">

                      <div class="col-md-8">
                        
                        <div class="form-group" style="align-items: center;">
                          <label for="product-title">Product Title </label>
                          <input type="text" name="name" value="<?php echo $name; ?>"></label>
                      </div>

                      <br>
                      <div class="form-group">
                        <div class="col-xs-3">
                          <label for="product-price">Product Price</label>
                          <input type="number" name="price" class="form-control" size="60" value="<?php echo $price; ?>">
                        </div>
                        <br>
                        <label for="product-title">Product Description</label>
                           <br>
                        <textarea name="description" id="" cols="76" rows="10" class="form-control" ><?php echo $description; ?></textarea>
                    </div>


                    </div>

                      <br>
                      <div class="col-md-12 pull-right">
                        <div class="photo">
                            <label for="foto">Foto</label>
                            <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                                <?php echo $foto?>
                                </div>
                            <div class="upimg">
                                <input type="file" name="file" id="file" >
                            </div>
                            <div id="form_alert"></div>
                        </div>
                      <br>

                        <div class="form-group" style="padding-left: 800px;">
                          <div class="row">
                              <input type="submit" name="back" class="btn" value="Back">
                              <input type="submit" name="publish" class="btn" value="Publish">
                          </div>
                        
                      </div>

                       </div>

            </form>
              </div>

           </div>


  </body>


  <script>
$(document).ready(function() {

    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change", function() {
        var uploadFoto = document.getElementById("foto").value;
        var foto = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');

        if (uploadFoto != '') {
            var type = foto[0].type;
            var name = foto[0].name;
            if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                $("#img").remove();
                $(".delPhoto").addClass('notBlock');
                $('#foto').val('');
                return false;
            } else {
                contactAlert.innerHTML = '';
                $("#img").remove();
                $(".delPhoto").removeClass('notBlock');
                var objeto_url = nav.createObjectURL(this.files[0]);
                $(".prevPhoto").append("<img id='img' src=" + objeto_url + ">");
                $(".upimg label").remove();

            }
        } else {
            alert("No selecciono foto");
            $("#img").remove();
        }
    });

    $('.delPhoto').click(function() {
        $('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        $("#img").remove();

    });

});
</script>
</html>

