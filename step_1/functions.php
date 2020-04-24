<?php

function connect_db($host, $username, $passwd, $port, $db) {
    
    $database = null;    
    try  {
        
        $database = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");

        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    } catch (PDOException $e) {
        
        $log_file = "./ERROR_LOG_FILE.log";
        
        error_log('PDO ERROR: ' . $e->getMessage(), 3 , $log_file);
        echo 'PDO ERROR: ' . $e->getMessage() . " storage in " . "./ERROR_LOG_FILE.log" . PHP_EOL;
    }
    
    
    return $database;
}

//---------------------------------------------------------------CREATE USER

function create_user($name, $password, $email, $admin) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $error = false;
    
//--Email

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $_email = $email;
    } else if ($email != null) {
        
        echo " -- Email is not a valid email address -- ";
        $error = true;
    }

//--Request

    $req = "INSERT INTO users(username , password, email, admin, secret_question, answer)
    VALUES (?, ?, ?, ?, 'Question', 'Answer')";

    $prep_req = $db->prepare($req);

//--name bind(login)
    $prep_req->bindParam(1, $name);

//--password bind
    $prep_req->bindParam(2, $password);

//--email bind (login@login.com)
    $prep_req->bindParam(3, $_email);

//--admin bind (1 ou 0)
    $prep_req->bindParam(4, $admin);

//--EXEC

    if ($error == false) {

        $prep_req->execute();

        echo " -- User created -- " . PHP_EOL;
    }
}

//---------------------------------------------------------------DELETE USER

function delete_user($name) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "DELETE FROM users WHERE username = ?";

    $prep_req = $db->prepare($req);

    $prep_req->bindParam(1, $name);

    $prep_req->execute();
    echo " -- User deleted -- ";
}

//---------------------------------------------------------------EDIT USER

function edit_user($old_name, $new_name, $password, $email) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "UPDATE users 
            SET username = '$new_name',
                password = '$password',
                email = '$email'
                
            
            WHERE username = '$old_name'";

    $prep_req = $db->prepare($req);

    

    $prep_req->execute();

    echo "-- User Successfully edited --";
}

//---------------------------------------------------------------DISPLAY USER

function display_user($name) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "SELECT * FROM users WHERE username = '$name'";

    $prep_req = $db->prepare($req);

    
    $req = $prep_req->fetchAll(PDO::FETCH_ASSOC);
    $prep_req->execute();

    foreach($prep_req as $prep_req) {
        
        


        echo '<html>
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
                    <div class="row">    
                        <div class="col s6 m6">
                            <div class="card blue-grey darken-1"> 
                            <div class="card-content white-text">
                                <span class="card-title">User: '.$prep_req['username'].'</span>
                                    
                                        <p> User ID:  '. $prep_req['id'] .''. PHP_EOL . '</p>
                                        <p> User Name:  '. $prep_req['username'] . '' .PHP_EOL .'</p>
                                        <p> User Password:  '. $prep_req['password'] . ''.PHP_EOL . '</p>
                                        <p> User Email:  '. $prep_req['email'] . '' .PHP_EOL . '</p>
                                        <p> User Admin status:  '. $prep_req['admin'] . '' .PHP_EOL . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
        
    }
}

//---------------------------------------------------------------CREATE PRODUCT

function create_product($name, $price, $category, $picture, $target_id, $desc) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $error = false;
    
//--Request

    $req = "INSERT INTO products(name , price, category_id, picture_url, target_id, description)
    VALUES (?, ?, ?, ?, ?, ?)";

    $prep_req = $db->prepare($req);

//--name bind
    $prep_req->bindParam(1, $name);

//--price bind
    $prep_req->bindParam(2, $price);

//--category bind
    $prep_req->bindParam(3, $category);

//--picture bind
    $prep_req->bindParam(4, $picture);

//--target_id bind
    $prep_req->bindParam(5, $target_id);

//--description bind
    $prep_req->bindParam(6, $desc);

//--EXEC

    if ($error == false) {

        $prep_req->execute();

        echo " -- Product created -- " . PHP_EOL;
    }
}

//---------------------------------------------------------------DELETE PRODUCT

function delete_product($name) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "DELETE FROM products WHERE name = ?";

    $prep_req = $db->prepare($req);

    $prep_req->bindParam(1, $name);

    $prep_req->execute();

    echo " -- Product deleted --";
}

//---------------------------------------------------------------EDIT PRODUCT

function edit_product($old_name, $new_name, $new_price, $new_category_id, $new_picture_url, $new_target_id, $new_desc) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "UPDATE products 
            SET name = '$new_name',
                price = '$new_price',
                category_id = '$new_category_id',
                picture_url = '$new_picture_url',
                target_id = '$new_target_id',
                description = '$new_desc'
                
            
            WHERE name = '$old_name'";

    $prep_req = $db->prepare($req);

    

    $prep_req->execute();

    echo "-- Product Successfully edited --";
}

//---------------------------------------------------------------DISPLAY PRODUCT

function display_product($name) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

    $req = "SELECT * FROM products WHERE name = '$name'";

    $prep_req = $db->prepare($req);

    
    $req = $prep_req->fetchAll(PDO::FETCH_ASSOC);
    $prep_req->execute();

    foreach($prep_req as $prep_req) {
        
        echo '<html>
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
                        <div class="row">    
                            <div class="col s12 m6">
                                <div class="card blue-grey darken-1"> 
                                <div class="card-content white-text">
                                    <span class="card-title">Product: '.$prep_req['name'].'</span>
                                        
                                            <p> Product ID:  '. $prep_req['id'] .''. PHP_EOL . '</p>
                                            <p> Product Name:  '. $prep_req['name'] . '' .PHP_EOL .'</p>
                                            <p> Product Price:  '. $prep_req['price'] . ''.PHP_EOL . '</p>
                                            <p> Category ID:  '. $prep_req['category_id'] . '' .PHP_EOL . '</p>
                                            <p> Picture URL:  '. $prep_req['picture_url'] . '' .PHP_EOL . '</p>
                                            <p> Target ID:  '. $prep_req['target_id'] . '' .PHP_EOL . '</p>
                                            <p> Description:  '. $prep_req['description'] . '' .PHP_EOL . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>';
        
    }
}
function create_category($name) {

    $db = connect_db('localhost' , 'gecko' , 'geckosql' , 3306, 'pool_php_rush');

//--Request

    $req = "INSERT INTO categories (name)
    VALUES (?)";

    $prep_req = $db->prepare($req);

//--name bind
    $prep_req->bindParam(1, $name);




//--EXEC

       $prep_req->execute();

        echo " -- Category created -- " . PHP_EOL;
}


//create_category('hello', NULL);
//display_user('fred');
//create_product('CRUSADE - Pantalon classique', 9995,  3, 'https://img01.ztat.net/article/PE/12/1A/0F/9M/11/PE121A0F9-M11@4.jpg?imwidth=762', 2, 'Cool !');
// edit_product('CRUSADE - Pantalon classique', 'énorme', 4444, 3, 'yukiyuki', 3, 'cool');
//create_user('admin1', 'admin', 'admin1@admin.com', 1);
