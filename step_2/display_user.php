<?php 

include_once ('../step_1/functions.php');
session_start();

display_user($_SESSION['display_name']);

?>

<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
      <!--Montserrat font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        
    <a href="admin.php"class="waves-effect waves-teal btn-flat">Return</a>
    
    
    </body>

</html>  