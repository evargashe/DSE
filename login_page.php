<?php require_once("config.php");                                
        session_start();?>


<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include("navbar.php"); include('./functions.php') ?>
    <h6 style="text-align: center;" class="text-center bg-warning"><?php display_message();?></h6>


       
<div class="accout-page">
    <div class="container">
  
       <div class="row">

          
           <div class="col-2" style="padding-left: 500px;">
              <div class="form-container">
                 <div class="form-btn">
                     <span>Login con Odoo</span>
                 </div>
                 
                 <form class="" action="" method="post" enctype="multipart/form-data">

                      <?php #login_user(); 
                      
                      
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
                                        array('fields'=>array('id','login','name')) // Array of wanted fields
                                    );
                                    $is_log=False;
                                    $id= null;
                                    $name= " ";
                                    foreach ($customers as $customer){
                                        if($customer['login'] == $email)
                                        {
                                            $id=$customer['id'];
                                            $name=$customer['name'];
                                            $is_log=True;
                                        }
                                    }
                                    $message='';
                                    if ($is_log == False) {
                                        set_message("Incorrect email. Please try again.");
                                        redirect("login_page.php");
                                    } else {
                                        $_SESSION['users_id'] = $id;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['name'] = $name;
                                        if ($email == 'edwarjhoel.99@gmail.com') {
                                            
                                            redirect("admin_index.php");
                                        } else {
                                            redirect("homepage.php");
                                        }
                                    }
                                }
                      
                      
                      ?>

                        <?php 
                        if(!empty($message)) : ?>
                            <p><?= $message?> </p>
                        <?php endif; ?>
                        <input type="email" name="email" placeholder="email"></label>

                        <input type="submit" name="submit" class="btn btn-primary" >

            </form>
              </div>

           </div>

       </div>
</div>
</div>



