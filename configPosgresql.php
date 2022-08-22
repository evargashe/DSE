<?php 
$conn = pg_connect("host=localhost dbname=proyecodoo15 user=odoo15 password=odoo15")
or die('No se ha podido conectar: ' . pg_last_error());
/* 
$query = 'SELECT * FROM product_template';

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($conn); */


//insert
/* $query = "INSERT INTO product_add(name,price,description) VALUES ('edwar','4522','aaaaaaaaaaaaaaaaaaaa')";
$result = pg_query($query); */

//delete
/* $sql2 ="DELETE FROM product_add WHERE id = 11";

            $result = pg_query($sql2);
            $cmdtuples = pg_affected_rows($result);
            echo $cmdtuples . " record affected.\n";
            if (!$result) {
                $errormessage = pg_last_error();
                echo "Error with query: " . $errormessage;
                exit();
            } */




?>