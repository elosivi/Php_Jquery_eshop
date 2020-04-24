<?php

include_once ('../step_1/functions.php');
session_start();

    if (! empty($_POST['product_name'])) {

        $old_name = $_SESSION['product_name_edit'];
        
        $new_name = $_POST['product_name'];
        
        $new_price = $_POST['product_price'];
        
        $new_category_id = $_POST['product_category_id'];

        $new_picture_url = $_POST['product_picture_url'];

        $new_target_id = $_POST['product_target_id'];

        $new_desc = $_POST['product_desc'];
        
        
        edit_product($old_name, $new_name, $new_price, $new_category_id, $new_picture_url, $new_target_id, $new_desc);
        
        
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
                <h5>Edit Product : <?php echo $_SESSION['product_name_edit'] ?> </h5>
                <p>  </p>
            </div>
            
            <div class="row">
                <form method="POST" class="col s8" action="product_edit.php">
                
                <!-- NAME -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_name" type="text" class="validate">
                    <label for="first_name">New Name</label>
                    </div>
                </div>
                
                <!-- PRICE -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_price" type="text" class="validate">
                    <label for="first_name">New Price</label>
                    </div>
                </div>
                
                <!-- CATEGORY ID -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_category_id" type="text" class="validate">
                    <label for="email">New Category ID</label>
                    </div>
                </div>
                
                <!-- PICTURE URL -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_picture_url" type="text" class="validate">
                    <label for="first_name">New Picture URL</label>
                    </div>
                </div>
                
                <!-- TARGET ID -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_target_id" type="text" class="validate">
                    <label for="first_name">New Target ID</label>
                    </div>
                </div>
               
                <!-- DESC -->
                <div class="row">
                    <div class="center-input-field col s6">
                    <input name="product_desc" type="text" class="validate">
                    <label for="email">New Description</label>
                    </div>
                </div>
               
                <!-- SEND BUTTON -->
                <button class="btn waves-effect waves-light" type="submit" name="action_create_user">Edit Product
                          <i class="material-icons right">send</i>
                </button>

                </div>
                </form>
            
            
                <a href="admin.php"class="waves-effect waves-teal btn-flat">Return</a>
        
            </div>
        </div>
    
    
    </body>

</html>  