
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
    <link type="text/css" rel="stylesheet" href="../css/index_style.css"/>
    
    <!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker&display=swap" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- lien js -->
    <script type="text/javascript" src="index.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>

    <title>Home page</title>
</head>
<body class="index" id="top">

  <!-- ------------------------------------------------------- HEADER  ----------------------------------------------------- -->  
  <?php
 session_start();

if ( !(isset($_SESSION["name"]))) { 
        
  header('Status: 301 Moved Permanently', false, 301);
  header("Location:login.php");
  exit();
 
 }

    include ('header.php');
  ?>


  <!-- ------------------------------------------------------- B A N D E A U    D    A C C E U I L  ----------------------------------------------------- -->

<!-- A FAIRE: faire passer le titre sur le bandeau image -->
<!-- BONUS: nav accordeon cd materialize side nav -->

  <div class="logo">
      <h1>LET !</h1>
      <h4>Bienvenue dans notre e-boutique !</h4>
  </div>
 
  <div class="bandeauAccueil">
   
      <div class="Navboutique">
          <ul>
              <li><a href="articles.php">FEMME</a></li>  <!-- // creer get femme -->
              <li><a href="articles.php">HOMME</a></li>
              <li><a href="articles.php">ENFANT</a></li>
              
          </ul>
      </div>
  </div>

 <!-- ------------------------------------------------------- PRODUITS A LA UNE  ----------------------------------------------------- -->
  <div class="ProduitsUne">
      <h2>Notre sélection du moment:</h2>

          
    <div class="row produitUne">  
      <div class="article z-depth-5 hoverable col s0 m1"> </div>'; 
  <?php
            
              $connexion = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
              

              $requestArt = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
              $returnArt = $connexion->query($requestArt);
              while($ligne = $returnArt->fetch(PDO::FETCH_ASSOC)){
                  
                echo'<div class="article z-depth-5 hoverable col s10 l3">';
                  echo'<div class="card">';
                    echo'<div class="card-image">';
                      echo'<img src="'.$ligne['picture_url'].'">';
                      
                      echo'<a class="btn-floating halfway-fab waves-effect waves-light purple lighten-1"><i class="material-icons">add</i></a>';
                    echo'</div>';

                    echo'<div class="card-content ">';
                    echo'<span class="card-title truncate">'. $ligne['name'].'</span>';
                      echo'<p class="truncate">'.$ligne["description"].'</p>';
                      $price=$ligne["price"]/100;
                      echo'<p>'.$price.' €</p>';
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
            
                echo'<div class="article z-depth-5 hoverable col s0 m0.95"> </div>';
                
            
                }
  ?>     

               
      </div> <!-- fermeture div row produitUne-->

            <!-- //fin fiche produit  -->


  </div>

  
  

  <!-- ------------------------------------------------------- FOOTER  ----------------------------------------------------- -->
  <?php
  include ('footer.php');
  ?>
    




  </body>
</html>

