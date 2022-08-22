<?php require_once("config.php"); require_once("./functions.php");?>
<?php 
  if(isset($_GET['id'])) {

    $customer_ids = $models->execute_kw(
        $db, // DB name
        $uid, // User id, user login name won't work here
        $password, // User password
        'res.users', // Model name
        'search', // Function name
        array( // Search domain
            array( // Search domain conditions
                array('id', '=', $_GET['id']))
            )
    );
    $customers = $models->execute_kw($db, $uid, $password, 'res.users',
        'read',  // Function name
        array($customer_ids), // An array of record ids
        array('fields'=>array('id','login','name')) // Array of wanted fields
    );
      $id = $_GET['id'];

      foreach ($customers as $customer){
        $login = ($customer['login']);
        $name = ($customer['name']);   
      }
    update_user();
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
       <div class="container">
          
          <?php include("navbar.php") ?>
          
       </div>
       
       
<div class="accout-page">
    <div class="container">
  
       <div class="row">

           <div class="col-2">
              <div class="form-container">
                 <div class="form-btn">
                     <p>Account</p>
                 </div>

               <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="name" class="form-control"  value="<?php print $name; ?>">
                               
                           </div>
                               
                           <div class="form-group">
                                <label for="email">E-mail address</label>
                            <input type="email" name="email" class="form-control" value="<?php print $login; ?>">
                               
                           </div>

                            <div class="form-group">
                                <label for="password">ID</label>
                            <input type="number" name="password" class="form-control" value="<?php print $id; ?>">
                               
                           </div>

                            <div class="form-group">

                               
                           </div>
               </form>
              </div>
           </div>
       </div>
</div>
</div>


