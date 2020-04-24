<html>
<head>
   <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/login_inscription_style.css" type="text/css" />
      <!--Montserrat font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/b1d149a4d4.js" crossorigin="anonymous"></script>
</head>
<body class="inscription">
    <div id="container">

<?php

function display_form() {
    ?>
    <form method="POST" action="inscription.php">
    <h1>Register</h1>
        <label><b>Name</b></label>
            <input type="text" name="name" placeholder="Enter your name 3-10 char"required /><br />
        <label><b>Email</b></label>
            <input type="text" name="email" placeholder="Enter your email" required/><br />
        <label><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter you Password" required/><br />
        <label><b>Confirm Password</b></label>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required/><br />
            <label><b>Secret Question</b></label>
            <input type="text" name="secret_question" placeholder="Enter your secret question" required/><br />
            <label><b>Answer</b></label>
            <input type="text" name="answer" placeholder="Enter your answer" required/><br />
        <input type="submit" value="Submit form" />
        <a class="register_text" href="login.php">Already have an account ?</a>
    </form>
    </div>
</body>

<?php
}

function validate_input($name, $email, $password, $password_conf, $_secret_question, $_answer) {
    $valid = true;
    if(strlen($name) < 3 || strlen($name) >10) {
        echo "Invalid name<br />";
        $valid = false;
    }
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        echo "Invalid email<br />";
        $valid = false;
    }
    if(strlen($password) < 3 || strlen($password) >10) {
        echo "Invalid password or password confirmation<br />";
        $valid = false;
    }
    if($password_conf != $password) {
        echo "Invalid password or password confirmation<br />";
        $valid = false;
    }

    return $valid;
//si jai une erreur je creer un boolen  qui renvoit false sinon true
}

if(!empty($_POST)) {
    //connexion a la base de donnes
    $_name = $_POST['name'];
    $_email = $_POST['email'];
    $_passwd = $_POST['password'];
    $_passwdconf = $_POST['password_confirmation'];
    $_secret_question = $_POST['secret_question'];
    $_answer = $_POST['answer'];
    

    $rst = validate_input($_name, $_email, $_passwd, $_passwdconf, $_secret_question, $_answer);
    if ($rst == false) {
        display_form();
        return;
    }
    $_passwd = password_hash($_passwd, PASSWORD_DEFAULT); 

    try {
        $pdo = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
        $stmt = $pdo->prepare("INSERT INTO users(id, username, password, email, secret_question, answer) VALUES (NULL, :username, :password, :email, :secret_question, :answer)");
        $stmt->bindValue(":username", $_name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $_email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $_passwd, PDO::PARAM_STR);
        $stmt->bindValue(":secret_question", $_secret_question, PDO::PARAM_STR);
        $stmt->bindValue(":answer", $_answer, PDO::PARAM_STR);
  
        $res = $stmt->execute();
        if ($res == false) {
            echo "internal server error, please try again later" . PHP_EOL;
            print_r($stmt->errorInfo());
        } else {
            header("Location: login.php", true, 302);
                    exit();
        }
    } catch (Exception $e) {
        echo "internal server error, please try again later" . PHP_EOL;
        // echo $e->getMessage();
    }
    //faire requete
}

display_form();
