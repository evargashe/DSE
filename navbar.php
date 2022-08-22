

<div class="navbar">
        <link rel="stylesheet" href="style2.css">
    <nav>
     <ul id="MenuItems">
        <li><i class="fa fa-home" aria-hidden="true"></i><a href="homepage.php"> Home</a></li>
                <li><i class="fa fa-bars" aria-hidden="true"></i><a href="products.php"> Products 1</a></li>
                <li><i class="fa fa-bars" aria-hidden="true"></i><a href="products2.php"> Products 2</a></li>
    
        <li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="shopping_cart.php"> Shopping Cart</a></li>
        <li><i class="fa fa-user" aria-hidden="true"></i>
            <a href="
                <?php echo isset($_SESSION['email']) ? "profile.php?id={$_SESSION['users_id']}" : "login_page.php"
                ?>"> 
                <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "Login"
                ?>
            </a>
        </li>
        <li>
            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> 
                <?php echo isset($_SESSION['email']) ? "Logout" : "" ?>
            </a>
        </li>
        <li><a href="admin_index.php">
        <?php if(isset($_SESSION['email']) &&  ($_SESSION['email'] == 'edwarjhoel.99@gmail.com') ) {
            echo "Panel";
        } else {
            echo ""; 
        } ?></a></li>


     </ul>
    </nav>
    <img src="images/menu.png" onclick="menutoggle()" class="menu-icon">
</div>