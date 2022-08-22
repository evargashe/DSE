<?php require_once("config.php"); require_once("./configPosgresql.php"); require_once("./functions.php");

	if (isset($_GET['id'])) {
		$query = "DELETE FROM product_add WHERE id = " . $_GET['id'] . " ";
		$result = pg_query($query);
		$cmdtuples = pg_affected_rows($result);
		echo $cmdtuples . " record affected.\n";
		if (!$result) {
			$errormessage = pg_last_error();
			echo "Error with query: " . $errormessage;
			exit();
		} 

		set_message("Product Deleted");
		redirect("admin_products_posgresql.php"); 
	} else {

		redirect("admin_index.php");

	}

?>