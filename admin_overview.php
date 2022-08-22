<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>
<p style="font-size: 50px">
Bienvenido :
  <?php 
  session_start();
  echo $_SESSION['email']."<br/>";
  ?>

  </p>
