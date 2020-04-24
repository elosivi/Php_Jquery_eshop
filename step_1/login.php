
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
    <form method="POST" action="login.php">
        <h1>Login</h1>
        <label><b>Email</b></label>
        <input type="text" name="email" placeholder="Enter your email" required/><br />
        <label><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter your password" required /><br />
        <label><b>Remember me</b></label>
        <input type="checkbox" name="remember_me"/><br />
        <input type="submit" value="Submit" />
        <a class="register_text" href="inscription.php">Not registered yet ?</a></br>
        <a class="register_text" href="motdepasseoublie.php">Forgot password?</a>
    </form>
</div>
</body>
<?php
}

function validate_input($email, $password) {
    if($email == "" || $password == ""){
        echo "Incorrect email or password<br />";
        return false;
    }
    return true;
}

if(!empty($_POST)) { // sil a envoyer le formulaire rempli

    $_email = $_POST["email"];
    $_passwd = $_POST["password"];
    $rst = validate_input($_email, $_passwd);
    if ($rst == false) {
        display_form();
        return;
    }
    try {
        $pdo =new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
        $stmt = $pdo->prepare("SELECT id, admin, password, username FROM users WHERE email = :email");
        $res = $stmt->execute(["email" => $_email]);
        // $RES renvoit true ou false si la requete a fonctionne donc pas derreurs
        if ($res ==true){ 
           if ($stmt->rowCount() == 1) { // renvoit le nombre de rst
               $array = $stmt->fetch();
               $passwrd_in_db = $array["password"]; // recupere mon mdp de la db
               if (password_verify($_passwd, $passwrd_in_db) == true){

                   if(isset($_POST["remember_me"])){
                    setcookie("name", $array["username"], time()+ 3600); 
                    setcookie("email", $_email, time()+ 3600); 
                    setcookie("idUser", $_email, time()+ 3600); 
                    setcookie("isAdmin", $_email, time()+ 3600); 
                   }
                    session_start();
                    $_SESSION["name"] = $array["username"]; // dans mon tableau session la colonne name sera egal au nom de lutilsateur aue jai trouve en DB
                    $_SESSION["email"] = $_email;
                    $_SESSION["idUser"] = $array["id"];
                    $_SESSION["isAdmin"] = $array["admin"];
                    header("Location: index.php", true, 302);
                    exit();

               }
               else {
                echo "incorrect email/password";
               }
           } 
           else {
               echo "incorrect email/password";
           }
        }
        else {
            echo "internal server error, try again";
            // echo $e->getMessage();
        }  
    }
    catch (Exception $e) {
        echo "internal server error, please try again later" . PHP_EOL;
        // echo $e->getMessage();
    }
}


    

display_form();
