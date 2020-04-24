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
    <link type="text/css" rel="stylesheet" href="../css/user_page_style.css"/>
    
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

    $id=$_SESSION["idUser"];
    require('header.php');
    ?>







<div class="user_page">
 <div class="part_one">

<!-- -------------------------- carré en haut à droite -D E C O ------------------------- -->
     <div class="right_deco BGcamel">

     </div>

<!-- -------------------------- I N F O S         U S E R  ------------------------- -->

    <div id="bloc" class="user_infos BGpurple">
    <b class="tl"></b>
    <b class="tr"></b>
    <b class="bl"></b>
    <b class="br"></b>
        <h3>VOS INFORMATIONS PERSONNELLES</h3>

<?php
    $connexion = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
              
               
              $requestUserInfo = "SELECT * FROM users WHERE id=$id";
              $returnUserInfo = $connexion->query($requestUserInfo);
              while($lgn = $returnUserInfo->fetch(PDO::FETCH_ASSOC)){

                    $name = $lgn["username"];
                    $email = $lgn["email"];
                    $id = $lgn["id"] ;
                    $admin = $lgn["admin"] ;
                    $address = $lgn["address"];

                echo'<span>Nom Prénom :</span>  ';
                echo'<div class="trait"> </div>';
                echo '<p>'.$name.'</p>';
                
                echo'<span>Email :</span>  ';
                echo'<div class="trait"> </div>';
                echo '<p>'.$email.'</p>';

                // echo'<span>Adresse de livraison : </span>  ';
                // echo'<div class="trait"> </div>';
                // echo '<p>'.$address.'</p>';
              

              }


?>

    </div>

<!-- -------------------------- H E L L O         U S E R  ------------------------- -->

<div class="hello_user">

<h2 class="marker">HELLO <br> <?php echo $name; ?></h2>
<div id="avatar">
<img src="../img/img_avatar2.png" alt="Avatar" class="avatar">
</div>
</div>


 </div>




</div>











<?php
  require('footer.php');
  ?>
    




  </body>
</html>


