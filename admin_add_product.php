<?php require_once("config.php"); require_once("./functions.php")?>
<?php //add_product_admin();

$message="";
    $class="";
	require_once("./configPosgresql.php");
	if(isset($_POST['publish'])) {


		$product_name = $_POST['product_name'];
		$standard_price = $_POST['standard_price'];
		$product_description = $_POST['product_description'];

		//images 
		$foto= $_FILES['foto'];
		$nombre_foto=$foto['name'];
		$type=$foto['type'];
		$url_temp=$foto['tmp_name'];
		$imgProducto='./images/cart.png';
		
		if($nombre_foto != '')
		{
      echo "entro";
			$destino='./img/uploader/';
			$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
			$imgProducto=$img_nombre.'.jpg';
			$src=$destino.$imgProducto;
		}
		$cons = "INSERT INTO product_add(name,price,description,image) values('".$product_name."','".$standard_price."','".$product_description."',
		'".$imgProducto."')";
					
		$r=pg_query($conn,$cons);

		if($r){
			if($nombre_foto != '')
			{
				move_uploaded_file($url_temp,$src);
			}
			$message= "Datos insertados con éxito";
			$class="alert alert-success";
			echo "<meta http-equiv='refresh' content='2;url=./admin_products_posgresql.php'/>";
	}
    else{
			$message="No se pudieron insertar los datos";
			$class="alert alert-danger";
			echo "<meta http-equiv='refresh' content='2;url=./admin_add_product.php'/>";
	}
	} 

	if(isset($_POST['back'])) {
		redirect("admin_index.php");
	}


?>


    <?php include("admin_header.php") ?>

    <?php include("sidebar.php") ?>

        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <header class="w3-container" style="padding-top:22px">

  </header>

  <div class="w3-container">
  	<h3 class="bg"><?php require_once("./configPosgresql.php");?></h3>
  	<h3> Add Product </h3>
    <hr style="border-color: black;">

    <div class="<?php echo $class?>">
		<?php echo $message;?>
		</div>

  </div>

          
           <div class="col-2" style="padding-left: 20px;">

              <div class="form-container2">
                 <div class="form-btn">
                 </div>
                 
                 <form class="" action="" method="post" enctype="multipart/form-data">

                      <div class="col-md-8">
                        
                        <div class="form-group" style="align-items: center;">
                          <label for="product-Name">Product Name </label>
                          <input type="text" name="product_name" placeholder="name"></label>
                      </div>

                      <br>
                      <div class="form-group">
                        <div class="col-xs-3">
                          <label for="product-price">Product Price</label>
                          <input type="number" name="standard_price" class="form-control" placeholder="Price" size="60">
                        </div>
                        <br>
                        <label for="product-title">Product Description</label>
                           <br>
                        <textarea name="product_description" id="" cols="76" rows="10" class="form-control" placeholder="Write product description here..."></textarea>
                    </div>

                      <br>
                    <br>
                      <br>
                      <div class="col-md-12 pull-right">
                      <div class="photo">
                        <label for="foto">Product Image</label>
                          <div class="prevPhoto">
                            <span class="delPhoto notBlock">X</span>
                            <label for="foto"></label>
                          </div>
                          <div class="upimg">
                            <input type="file" name="foto" id="foto">
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


<script>
$(document).ready(function(){

//--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
$("#foto").on("change",function(){
	var uploadFoto = document.getElementById("foto").value;
	var foto       = document.getElementById("foto").files;
	var nav = window.URL || window.webkitURL;
	var contactAlert = document.getElementById('form_alert');
	
		if(uploadFoto !='')
		{
			var type = foto[0].type;
			var name = foto[0].name;
			if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
			{
				contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
				$("#img").remove();
				$(".delPhoto").addClass('notBlock');
				$('#foto').val('');
				return false;
			}else{  
					contactAlert.innerHTML='';
					$("#img").remove();
					$(".delPhoto").removeClass('notBlock');
					var objeto_url = nav.createObjectURL(this.files[0]);
					$(".prevPhoto").append("<img id='img' src="+objeto_url+">");
					$(".upimg label").remove();
					
				}
		  }else{
			  alert("No selecciono foto");
			$("#img").remove();
		  }              
});

$('.delPhoto').click(function(){
	$('#foto').val('');
	$(".delPhoto").addClass('notBlock');
	$("#img").remove();

});

});

</script>