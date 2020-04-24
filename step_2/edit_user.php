<?php

include_once ('../step_1/functions.php');
session_start();

    if (! empty($_POST['first_name'])) {

        $old_name = $_SESSION['edit_name'];
        
        $new_name = $_POST['first_name'];
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $email = $_POST['email'];
        
        
        edit_user($old_name, $new_name, $password, $email);
        
    }


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
        
        <div class="container">
                        
                    <div class="divider"></div>
            <div class="section">
                <h5>Edit User : <?php echo $_SESSION['edit_name'] ?> </h5>
                <p>  </p>
            </div>
            
            <div class="row">
                <form method="POST" class="col s8" action="edit_user.php">
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="first_name" type="text" class="validate">
                    <label for="first_name">New Username</label>
                    </div>
                </div>

                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="password" type="text" class="validate">
                    <label for="first_name">New Password</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="email" type="email" class="validate">
                    <label for="email">New Email</label>
                    </div>
                </div>
                
                <button class="btn waves-effect waves-light" type="submit" name="action_create_user">Edit User
                          <i class="material-icons right">send</i>
                </button>

                </div>
                </form>
            
            
                <a href="admin.php"class="waves-effect waves-teal btn-flat">Return</a>
        
            </div>
        </div>
    
    
    </body>

</html>  