<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/b1d149a4d4.js" crossorigin="anonymous"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <link type="text/css" rel="stylesheet" href="../css/articles.css"/>
    
    <link type="text/css" rel="stylesheet" href="../css/index_style.css"/>
    

    <!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker&display=swap" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- lien js -->
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>

    <title>Home page</title>
</head>
<body class="index">

  <!-- ------------------------------------------------------- HEADER  ----------------------------------------------------- -->  
 

<?php
session_start();
if ((!isset($_SESSION['name']) || empty($_SESSION['name'])) && (!isset($_COOKIE['username'])) ){
header("Location: login.php", true, 302);
exit;
}

function listTargets() {
    $pdo = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
    $stmt = $pdo->prepare("SELECT * FROM targets");
    $res = $stmt->execute();
    // $RES renvoit true ou false si la requete a fonctionne donc pas derreurs
    if ($res ==true){ 
       if ($stmt->rowCount() > 0) { // renvoit le nombre de rst
           $array = $stmt->fetchAll();
           return $array;
       }
    } else {
        // Error
    }
    return null;
}

include ('header.php');
?>
<!-- ------------------------------------------------------- banner ----------------------------------------------------- -->  

<div class="category_list">

  <?php
      $targets = listTargets();
      foreach ($targets as $t) {
          ?>
              <a href="articles_target.php?target=<?php echo $t["id"]; ?>">   
                  <div id="index-banner" class="parallax-container articles_category">
                      <div class="section no-pad-bot">
                          <div class="container parallax-text-block">
                              <div class="row title_row">
                                  <div class="col s12">
                                      <h1 class="header title_header text_bold"><?php echo $t["name"]; ?></h1>
                                  </div>
                              </div>
                              <div class="parallax parallax-img" style="background:linear-gradient(0deg, rgba(100, 100, 100, 0.3), rgba(0, 0, 255, 0.3)), url(<?php echo $t["picture_url"]; ?>); background-size: cover;"></div>
                          </div>
                      </div>
                  </div> 
              </a>
          <?php
      }
  ?>

</div>

  <!-- ------------------------------------------------------- B A N D E A U    D    A C C E U I L  ----------------------------------------------------- -->


 

  <!-- ------------------------------------------------------- RESEAUX SOCIAUX ----------------------------------------------------- -->
  
    
  
  <!------------------------------------------------- bouton revenir en haut ---------------------------------->
  <div class="fixed-action-btn">
    
    <a href="#top" class="btn-floating btn-large">
   <i class="large material-icons">arrow_upward</i>
    </a>
  
  </div>
  
  <!-- ------------------------------------------------------- FOOTER  ----------------------------------------------------- -->
  <?php
  include ('footer.php');
  ?>
    



    </body>
  
</html>

