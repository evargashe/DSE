<?php
require ('./config.php');
function set_message($message) {
	if (!empty($message)) {
		$_SESSION['message'] = $message;
	} else {
		$message = "";
	}
}

function display_message() {

	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

}

function redirect($location) {
	return header("Location: $location");
}



function confirm($result) {
	global $connection;

	if (!$result) {
		die("QUERY FAILED " . mysqli_error($connection));
	}
}




function get_four_products() {
	$count = 0;
	$product_name = $models->execute_kw(
		$db, // DB name
		$uid, // User id, user login name won't work here
		$password, // User password
		'product.template', // Model name
		'search', // Function name
		array( // Search domain
			array( // Search domain conditions
				array('active', '=', true))
			)
	 );
	$product = $models->execute_kw($db, $uid, $password, 'product.template',
		'read',  // Function name
		array($product_name), // An array of record ids
		array('fields' => array('id','name','standard_price','image_1920','description','taxes_id')) // Array of wanted fields
	);
	foreach ($product as $customer){
		if ($count < 8) {
			$product = <<<DELIMETER
		    <div class="col-4">
		    	<a href="product_detail.php?id={$customer['id']}"><img src="images/cart.png}"></a>
		    	<h4><a href="product_detail.php?id={$customer['id']}">{$customer['name']}</a></h4>
		    	<p style="color: red;">&#36;{$customer['standard_price']}</p>
		    	<p>{$customer['taxes_id']}</p>
		        <a class="btn" href="cart.php?add={$customer['id']}">Add to cart</a>
		    </div>
		DELIMETER;

		echo $product;
		$count = $count + 1;
		}
		
	}
}

function get_products() {
	require ("./config.php");
	$product_name = $models->execute_kw(
		$db, // DB name
		$uid, // User id, user login name won't work here
		$password, // User password
		'product.template', // Model name
		'search', // Function name
		array( // Search domain
			array( // Search domain conditions
				array('active', '=', true))
			)
	 );
	$product = $models->execute_kw($db, $uid, $password, 'product.template',
		'read',  // Function name
		array($product_name), // An array of record ids
		array('fields' => array('id','name','standard_price','image_1920','description','create_date')) // Array of wanted fields
	);
	foreach ($product as $customer){
		$product = <<<DELIMETER
			<div class="col-4">
		    	<img width='100' src="images/cart.png">
		    	<h4><a href="product_detail1.php?id={$customer['id']}">{$customer['name']}</a></h4>
		    	<p style="color: red;">&#36;{$customer['standard_price']}</p>
		        <a class="btn" href="cart.php?add={$customer['id']}">Add to cart</a>
		    </div>
		DELIMETER;

		echo $product;

	}
}

function get_products_postgresql() {
	
}



function login_user() {
	session_start();
	require('./config.php');
	if(isset($_POST['submit'])) {
		$email = $_POST['email'];

		$customer_ids = $models->execute_kw(
			$db, // DB name
			$uid, // User id, user login name won't work here
			$password, // User password
			'res.users', // Model name
			'search', // Function name
			array( // Search domain
				array( // Search domain conditions
					array('active', '=', true))
				)
		 );
		$customers = $models->execute_kw($db, $uid, $password, 'res.users',
			'read',  // Function name
			array($customer_ids), // An array of record ids
			array('fields'=>array('id','login')) // Array of wanted fields
		);
		$is_log=False;
		$id= null;
		foreach ($customers as $customer){
			if($customer['login'] == $email)
			{
				$ig=$customer['id'];
				$is_log=True;
			}
		}
		$message='';
		if ($is_log == False) {
			set_message("Incorrect username or password. Please try again.");
			redirect("login_page.php");
		} else {
			$_SESSION['user_id'] = $id;
			$_SESSION['email'] = $email;

			if ($email == 'edwarjhoel.99@gmail.com') {
				redirect("admin_index.php");
			} else {
				redirect("homepage.php");
			}
		}
	}
}











function update_user() {

	require("./config.php");
	if(isset($_POST['update_user'])) {

		$models->execute_kw($db, $uid, $password, 'res.users', 'write', array(array($id), array('name'=>"{$_POST['name']}")));
		set_message("User has been updated");
		redirect("profile.php");
	} 
}






function get_products_admin_page() {

	$count = 0;
	require ("./config.php");
	$product_name = $models->execute_kw(
		$db, // DB name
		$uid, // User id, user login name won't work here
		$password, // User password
		'product.template', // Model name
		'search', // Function name
		array( // Search domain
			array( // Search domain conditions
				array('active', '=', true))
			)
	 );
	$product = $models->execute_kw($db, $uid, $password, 'product.template',
		'read',  // Function name
		array($product_name), // An array of record ids
		array('fields' => array('id','name','standard_price','image_1920','description','create_date')) // Array of wanted fields
	);
	foreach ($product as $customer){
			$product = <<<DELIMETER
		    <tr>
				<td>{$customer['id']}</td>
				<td><img src="images/cart.png" width=70></td>
				<td>{$customer['name']}</a><br></td>
				<td>&#36;{$customer['standard_price']}</td>
				<td>{$customer['description']} </td>
				<td>{$customer['create_date']} </td>
			</tr>
		DELIMETER;

		echo $product;
		}
		
	}

	function get_products_admin_page_postgresql() {

		$count = 0;
		require_once("./configPosgresql.php");
		$query = "SELECT id, name, price, description, create_date, image
		FROM public.product_add;";
		$r = pg_query($conn,$query);

		while($obj=pg_fetch_object($r)){


			if($obj->image!='./images/cart.png'){
				$foto='./img/uploader/'.$obj->image;
			}
			else{
				$foto='images/'.$obj->image;
			}
				$product = <<<DELIMETER
				<tr>
					<td>{$obj->id}</td>
					<td><img src="{$foto}" width="70"></td>
					<td><a href="admin_update_product.php?id={$obj->id}">{$obj->name}</a><br></td>
					<td>&#36;{$obj->price}</td>
					<td>{$obj->description} </td>
					<td>{$obj->create_date} </td>
					<td><a class="btn btn-link btn-rounded btn-sm fw-bold" href="admin_delete_product.php?id={$obj->id}" >Remove</a></td>
				</tr>
			DELIMETER;
	
			echo $product;
			}
			
		}



function update_product_admin() {

	if(isset($_POST['publish'])) {


		$name          = ($_POST['name']);
		$price    = ($_POST['price']);
		$description          = ($_POST['description']);
		$image          = ($_FILES['file']['name']);
		$image_temp_location    = ($_FILES['file']['tmp_name']);

		if(empty($image)) {

			$get_pic = pg_query("SELECT image FROM product_add WHERE id =" .($_GET['id']). " ");
			if (!$get_pic) {
				echo "Ocurrió un error.\n";
				exit;
			}

			while($pic = pg_fetch_array($get_pic)) {

				$image = $pic['image'];

		    }

		}

		$query =pg_query("UPDATE product_add SET price = {$price} WHERE id=".$_GET['id']."");
		if (!$query) {
			echo "Ocurrió un error.\n";
			exit;
		}
		echo "Product has been updated \n";
		redirect("./admin_products_posgresql.php");


	} 

	if(isset($_POST['back'])) {
		redirect("admin_index.php");
	}

}



function add_user_admin() {
	require("config.php");
	if(isset($_POST['add_user'])) {

		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$pass = ($_POST['password']);
		
		$user_id=$models->execute_kw($db, $uid, $password, 'res.users', 'create', array(array('name'=>"$username", 'login'=>"$email",
												'company_ids'=>[1], 'company_id'=>1, 'new_password'=>"$pass")));

		print("USER CREATED");

		redirect("users.php");


	}

}


function display_users() {
	require("config.php");

	$customer_ids = $models->execute_kw(
		$db, // DB name
		$uid, // User id, user login name won't work here
		$password, // User password
		'res.users', // Model name
		'search', // Function name
		array( // Search domain
			array( // Search domain conditions
				array('active', '=', true))
			)
	 );
	$customers = $models->execute_kw($db, $uid, $password, 'res.users',
		'read',  // Function name
		array($customer_ids), // An array of record ids
		array('fields'=>array('id','name','login')) // Array of wanted fields
	);

	foreach ($customers as $customer){
		$user = <<<DELIMETER
		<tr>
		    <td>{$customer['id']}</td>
		    <td style="padding-left: 50px;">{$customer['name']}</td>
		    <td style="padding-left: 50px;">{$customer['login']}</td>
		    <td><a style="color:red; padding-left: 30px;" class="btn btn-danger" href="delete_user.php?id={$customer['id']}">Delete User</a>
		</tr>
		DELIMETER;

		echo $user;

	}
}


?>