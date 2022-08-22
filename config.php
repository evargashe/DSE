<?php 
$url = 'http://localhost:8069';
$url_auth = $url . '/xmlrpc/2/common';
$url_exec = $url . '/xmlrpc/2/object';
$db = 'proyecodoo15';
$username = 'edwarjhoel.99@gmail.com';
$password = 'jelisedwar';
require_once('ripcord\ripcord.php');
// Login
$common = ripcord::client($url_auth);
$uid = $common->authenticate($db, $username, $password, array());
/* print("<p>Your current user id is '${uid}'</p>");
 */
$models = ripcord::client($url_exec);
$models                 // The (Ripcord) client
    ->execute_kw(       // Execute command
    'table.reference',  // Referenced model, e.g. 'res.partner' or 'account.invoice'
    'search',           // Search method of the referenced model
    array()             // Search domain
);

/* $salesorder = $models->execute_kw($db,$uid,$password, 'product.template','search',array(array(array('id', '=', 1))));
$account_ids = $models->execute_kw($db,$uid,$password,'product.template','read',
array($salesorder),array('fields'=> array('name','standard_price')));

print_r($account_ids);

 */
/* $customer_ids = $models->execute_kw(
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
			array('fields'=>array('login')) // Array of wanted fields
		);
$is_log=False;
foreach ($customers as $customer){
    $date=$customer['login'];
    if($customer['login'] == "edwarjhoel.99@gmail.com")
    {
        $is_log=True;
    }
}

if($is_log==False)
    echo "incorrecto";
else{
    echo "correcto";
} */



/* $customer_ids = $models->execute_kw(
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
$id = null;
foreach ($customers as $customer){
    if( $customer['login']== 'edwarjhoel.99@gmail.com')
        $id=$customer['id'];
}

echo $id."<br/>"; */


?>