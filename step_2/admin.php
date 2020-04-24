
<?php 

include_once ('../step_1/functions.php');

session_start();

//--CREATE USER  

  if (! empty($_POST['first_name_create'])) {

    $username    =  $_POST['first_name_create'];
	  $password   =  $_POST['password_create'];
    $email  =  $_POST['email_create'];
    $_passwd = password_hash($password, PASSWORD_DEFAULT);
    $admin = $_POST['admin_create'];

    create_user($username, $_passwd, $email, $admin);
  }

//--DELETE USER
  
  if (! empty($_POST['first_name_delete'])) {

    $name = $_POST['first_name_delete'];
    
    delete_user($name);
    
  }

//--EDIT USER

  if (! empty($_POST['edit_user'])) {

    header('Location: edit_user.php');
    
    $_SESSION['edit_name'] = $_POST['edit_user'];
    

  }

//--DISPLAY USER

  if(! empty($_POST['display_user_name'])) {

    header('Location: display_user.php');

    $_SESSION['display_name'] = $_POST['display_user_name'];
  }
//--CREATE PRODUCT

  if (! empty($_POST['product_name'])) {

    $name    =  $_POST['product_name'];
	  $price   =  $_POST['price_create'];
    $category  =  $_POST['category_create'];
    $picture = $_POST['picture_create'];
    $target_id = $_POST['target_create'];
    $desc = $_POST['desc_create'];

    create_product($name, $price, $category, $picture, $target_id, $desc);
  }

//--DELETE PRODUCT

  if (! empty($_POST['product_delete'])) {

    $name = $_POST['product_delete'];
    
    delete_product($name);
    
  }

//--EDIT PRODUCT

  if (! empty($_POST['edit_product'])) {

    header('Location: product_edit.php');
    
    $_SESSION['product_name_edit'] = $_POST['edit_product'];
    

  }

//--DISPLAY PRODUCT

  if(! empty($_POST['display_product_name'])) {

    header('Location: display_product.php');

    $_SESSION['display_product_name'] = $_POST['display_product_name'];
  }


//--ADD CATEGORY

  if (! empty($_POST['add_category'])) {

    create_category($_POST['add_category']);
  }

?>


<!DOCTYPE html>

  
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
      <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"/>  
    </head>

    <body class="deep-orange lighten-5">

    <div class="container">
        
    <div class="divider"></div>
            <div class="section bold ">
                <h5>Admin Settings</h5>
                <p>  </p>
            </div>
        
        <ul class="collapsible ">
          <li>
            
            <!--CREATE USER-->
            <div class="collapsible-header BGcamel bold"><i class="material-icons BGcamel bold">add_box</i>Create User</div>
            <div class="collapsible-body deep-orange lighten-5"><span>
            <div class="row ">
                    <form method="POST" class="col s6 "  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="first_name_create" type="text" class="validate">
                          <label for="first_name">Username</label>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="input-field col s6">
                          <input name="password_create" type="password" class="validate">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s6">
                          <input name="email_create" type="email" class="validate">
                          <label for="email">Email</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s6">
                          <input name="admin_create" type="text" class="validate">
                          <label for="email">Admin (0 or 1)</label>
                        </div>
                      </div>
                      
                        <button class="btn waves-effect BGcamel bold" type="submit" name="action_create_user">Create
                          <i class="material right"></i>
                        </button>
        
                    </form>
                  </div>
            </span>
            </div>
          </li>
          <li>
            <!--DELETE USER-->
            <div class="collapsible-header BGcamel bold"><i class="material-icons">delete</i>Delete User</div>
            <div class="collapsible-body"><span><div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="first_name_delete" type="text" class="validate">
                          <label for="first_name">Username</label>
                        </div>
                      </div>
                    
                      <button class="btn waves-effect BGcamel bold" type="submit" name="action">Submit
                        <i class="material right"></i>
                      </button>
        
                    </form>
                  </div></span></div>
          </li>
          <li>
            <!--EDIT USER--> 
            <div class="collapsible-header BGcamel bold"><i class="material-icons">create</i>Edit User</div>
            <div class="collapsible-body"><span>
            <div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="edit_user" type="text" class="validate">
                          <label for="first_name">Username</label>
                        </div>
                      </div>
                      <button class="btn waves-effect BGcamel bold col s2"  type="submit" name="action">Go to Edit
                          <i class="material right"></i>
                      </button>
                    
                    </form></div></span></div>
          </li>
          <li>
            <!-- DIPLAY USER -->
            <div class="collapsible-header BGcamel bold"><i class="material-icons">account_box</i>Display User Info</div>
            <div class="collapsible-body"><span><div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="display_user_name" type="text" class="validate">
                          <label for="first_name">Username</label>
                        </div>
                      </div>
                    
                      <button class="btn waves-effect BGcamel bold" type="submit" name="action">Display
                        <i class="material right"></i>
                      </button>
                    
                    </form>

                    

                  </div></span></div>
          </li>
          <li>
            <!--ADD PRODUCT-->
            <div class="collapsible-header BGpurple bold"><i class="material-icons">add_circle</i>Add New Product</div>
            <div class="collapsible-body"><span>
            <div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      
                      <!-- NAME -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="product_name" type="text" class="validate">
                          <label for="first_name">Product Name</label>
                        </div>
                      </div>
        
                      <!-- PRICE -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input name="price_create" type="text" class="validate">
                          <label for="password">Price</label>
                        </div>
                      </div>
                      
                      <!-- ID -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input name="category_create" type="text" class="validate">
                          <label for="email">Category ID</label>
                        </div>
                      </div>
                      
                      <!-- URL -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="picture_create" type="text" class="validate">
                          <label for="first_name">Picture URL</label>
                        </div>
                      </div>
        
                      <!-- TARGET ID -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input name="target_create" type="text" class="validate">
                          <label for="password">Target ID</label>
                        </div>
                      </div>
                      
                      <!-- DESC -->
                      <div class="row">
                        <div class="input-field col s12">
                          <input name="desc_create" type="text" class="validate">
                          <label for="email">Description</label>
                        </div>
                      </div>
                      
                      <button class="btn waves-effect BGpurple bold" type="submit" name="action">Create Product
                        <i class="material right"></i>
                      </button>

                    </form>
                  </div></span></div>
          </li>
          <li>
            <!--DELETE PRODUCT-->
            <div class="collapsible-header BGpurple bold"><i class="material-icons">cancel</i>Delete Product</div>
            <div class="collapsible-body"><span><div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      
                      <!-- NAME -->
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="product_delete" type="text" class="validate">
                          <label for="first_name">Product Name</label>
                        </div>
                      </div>
                    
                      <button class="btn waves-effect BGpurple bold" type="submit" name="action">Delete Product
                        <i class="material right"></i>
                      </button>
                    
                    </form>
                  </div></span></div>
          </li>
          <li>
            <!--EDIT PRODUCT-->
            <div class="collapsible-header BGpurple bold"><i class="material-icons">border_color</i>Edit Product</div>
            <div class="collapsible-body"><span>
            <div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="edit_product" type="text" class="validate">
                          <label for="first_name">Product Name</label>
                        </div>
                      </div>
                      <button class="btn waves-effect BGpurple bold col s2"  type="submit" name="action">Go to Edit
                          <i class="material right"></i>
                      </button>
                    
                    </form></div></span></div>

            
          </li>
          <li>
            <!--DISPLAY PRODUCT-->
            <div class="collapsible-header BGpurple bold"><i class="material-icons">archive</i>Display Product</div>
            <div class="collapsible-body"><span><div class="row">
                    <form method="POST" class="col s6"  action="admin.php">
                      <div class="row">
                        <div class="input-field col s6">
                          <input placeholder="Placeholder" name="display_product_name" type="text" class="validate">
                          <label for="first_name">Product Name</label>
                        </div>
                      </div>
                    
                      <button class="btn waves-effect BGpurple bold" type="submit" name="action">Display Product
                        <i class="material right"></i>
                      </button>
                    
                    </form>
                  </div></span></div>
          </li>
        </ul>
        
      
            <ul class="collapsible">
              <li>
                <div class="collapsible-header red accent-1 bold"><i class="material-icons">filter_drama</i> Add Category</div>
                  <div class="collapsible-body">
                    <span> 
                      <div class="row">
                        <form method="POST" class="col s6"  action="admin.php">
                          
                          <div class="row">
                            <div class="input-field col s6">
                              <input placeholder="Name" name="add_category" type="text" class="validate">
                              <label for="first_name">Category Name</label>
                            </div>
                          </div>
                    
                        <button class="btn waves-effect red accent-1" type="submit" name="action">Add category
                          <i class="material right"></i>
                        </button>
                      </form>
                    </span>
                  </div>
                </li>
              </ul>
        
      
      <a href="../step_1/index.php"class="waves-effect waves-teal btn-flat bold">Return to index</a>

  </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.js"></script>
      <script>M.AutoInit();</script>
    </body>
</html>