<header>

<!-- utiliser tooltips de materialize sur la nav -->
<nav>
    <div class="nav-wrapper header grey darken-4">
      <a href="index.php" class="brand-logo">LET !</a>
      <ul id="nav-mobile" class="min right hide-on-med-and-down">
        <?php
        if(($_SESSION["isAdmin"]==1)){
        echo"<li><a href='../step_2/admin.php'>Admin</li>";
        }
        ?>
        <li><a href="articles.php">Articles</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="user"><a href="user_page.php"><i class="fas fa-user"><?php echo "<span> ".$_SESSION['name']."</span>"?></i></a></li>  
        
      </ul>
    </div>
  </nav>
</header>