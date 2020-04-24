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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e70e30e3c68120012947736&product=inline-share-buttons&cms=website' async='async'></script>

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

function getArticles($_target_id) {
  $pdo =new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
  $stmt = $pdo->prepare("SELECT * FROM products WHERE target_id=:target_id");
  $res = $stmt->execute(["target_id" => $_target_id]);
  // $RES renvoit true ou false si la requete a fonctionne donc pas derreurs
  if ($res ==true){ 
    if ($stmt->rowCount() > 0) { // renvoit le nombre de rst
      $array = $stmt->fetchAll();
      return $array;
    }
    else {
      // Error handling
    }
  }
  return null;
}

function getCategories() {
  $pdo = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
  $stmt = $pdo->prepare("SELECT * FROM categories");
  $res = $stmt->execute();
  if ($res ==true){ 
    if ($stmt->rowCount() > 0) { 
      $array = $stmt->fetchAll();
      return $array;
    }
    else {
      // Error handling
    }
  }
  return null;
}
require('header.php');



?>

<!-- ------------------------------------------------------- banner ----------------------------------------------------- -->  

  <!-- ------------------------------------------------------- B A N D E A U    D    A C C E U I L  ----------------------------------------------------- -->


 <!-- ------------------------------------------------------- FILTRES  ----------------------------------------------------- -->
  
  <div class="row filter_part">
  <div class="input-field col s5">
      <select id="sort_select">
        <option selected value="price_incr">Increasing price</option>
        <option value="price_decr">Decreasing price</option>
        <option value="alph_incr">Alphabetically</option>
        <option value="alph_decr">Reverse alphabetically</option>
      </select>
      <label>Choose your sort option :</label>
    </div>

    <div class="input-field col s5">
      <select id="category_select">
        <?php 
        $categories = getCategories();
        foreach($categories as $category){
          ?>
          <option value="<?php echo $category["id"];?>"><?php echo $category["name"];?></option><?php
        }
        ?>
        <option value="all" selected>All</option>
      </select>
      <label>What to display :</label>
    </div>
    <div class="input-field col s2">
      <input type="submit" id="sort_articles" value="filter" class="waves-effect waves-light btn btn-camel" />
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <input id="search_filter" onkeyup="mySearchByName()" type="text">
    <label for="search_filter" >Search in the name...</label>
  </div>
</div>

<div id="modal_contact_us" class="modal">
    <div class="modal-content">
      <h4 class="modal_title">You want to buy a product / get more information ?</h4>
      <p>You can contact us via :
        <br />
        <b>email :</b> contact@let.com
        <br />
        <b>phone :</b> +33 6 11 22 33 44
        <br />
        We will contact you back shortly ! 😘
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

 <!-- ------------------------------------------------------- PRODUITS A LA UNE  ----------------------------------------------------- -->
  <div class="row">

    <?php

      if (empty($_GET["target"])) {
        header("Location: articles.php", true, 302);
        exit;
      }
      $articles = getArticles($_GET["target"]);
      $counter = 0;
      foreach ($articles as $a) {
 
        ?>
          <div class="col s4">
            <div class="card large articles-card <?php echo "art-cat-".$a["category_id"];?>">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src=<?php echo $a["picture_url"] ?> />
              </div>
              <div class="card-content">
                <span class="card-title article-name activator grey-text text-darken-4"><?php echo $a["name"]; ?></span>
                <span class="card-price"><?php echo ($a["price"] / 100); ?></span>€
                <p><a class="modal-trigger" href="#modal_contact_us">Contact us</a></p>
              
                <div class="sharethis-inline-share-buttons"></div>
              </div>
              <div class="card-reveal" style="padding-top:50px">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <p class="card_reveal_text"><?php echo $a["description"]; ?></p>
                
              </div>
            </div>
          </div>
      <?php
      }
    ?>
  </div>


  
  <!------------------------------------------------- bouton revenir en haut ---------------------------------->
  <div class="fixed-action-btn">
    
    <a href="#top" class="btn-floating btn-large">
   <i class="large material-icons">arrow_upward</i>
    </a>
  
  </div>

  <!-- ------------------------------------------------------- FOOTER  ----------------------------------------------------- -->
  <?php
  require('footer.php');
  ?>
    




  </body>
</html>