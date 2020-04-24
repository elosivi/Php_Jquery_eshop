<html>
<head>
   <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/password.style.css" type="text/css" />
     <!--Montserrat font-->
     <link href="https://fonts.googleapis.com/css?family=Montserrat|Permanent+Marker&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/b1d149a4d4.js" crossorigin="anonymous"></script>
</head>
<body class="inscription">
    <div id="container">

    <?php
function display_email_form() {
    ?>

    <form method="POST" action="motdepasseoublie.php">
        <h1>Forgot Password</h1>
        <label><b>Email</b></label>
        <input type="text" name="email" placeholder="Enter your email" required/><br />
        <input type="submit" name = "forgot" value="Submit" />
    </form>
</div>
</body>
<?php
}

function display_question_form($question, $email) {
    ?>
    <form method="POST" action="motdepasseoublie.php">
        <h1>Forgot Password</h1>
        <label><b><?php echo $question?></b></label>
        <input type="text" name="answer" placeholder="Enter your answer" required/><br />
        <input type="password" name="new_password" placeholder="Enter your new password" required/><br />
        <input type="hidden" name="hidden_email" value="<?php echo $email;?>"/><br />
        <input type="submit" name = "forgot" value="Submit" />
    </form>
</div>
</body>
<?php
}

function validate_input($password) {
    if(strlen($password) < 3 || strlen($password) >10) {
        echo "Invalid password<br />";
        return false;
    }

    return true;
}

if(!empty($_POST)) { // sil a envoyer le formulaire rempli

    if (!empty($_POST["email"])){
        $pdo = new PDO("mysql:dbname=pool_php_rush; host=localhost; port=3306","elodie","codac");
        $stmt = $pdo->prepare("SELECT secret_question FROM users WHERE email = :email");
        $res = $stmt->execute(["email" => $_POST['email']]);

        if ($res ==true){ 
            if ($stmt->rowCount() == 1) { // renvoit le nombre de rst
                $array = $stmt->fetch();
                $secret_question_in_db = $array["secret_question"]; 
            } else {
                echo "Email address not found.";
                display_email_form();
                return;
            }
        } else {
            echo "Email address not found.";
            display_email_form();
            return;
        }
        display_question_form($secret_question_in_db, $_POST['email']);
        return;
    }
    else if (!empty($_POST["answer"])){
        if (validate_input($_POST['new_password']) == false) {
            display_email_form();
            return;
        }
        
        $email = $_POST['hidden_email'];
        $pdo = new PDO("mysql:host=localhost;port=3306;dbname=pool_php_rush", "gecko", "geckosql");
        $stmt = $pdo->prepare("SELECT answer FROM users WHERE email = :email");
        $res = $stmt->execute(["email" => $email]);
        
        if ($res ==true){ 
            if ($stmt->rowCount() == 1) { // renvoit le nombre de rst
                $array = $stmt->fetch();
                $answer_in_db = $array["answer"]; 
            } else {
                echo "Bad answer - Please try again.";
                display_email_form();
                return;
            }
        } else {
            echo "Bad answer - Please try again.";
            display_email_form();
            return;
        }
        if ($answer_in_db == $_POST["answer"]) {
            $_passwd = password_hash($_POST["new_password"], PASSWORD_DEFAULT); 

            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=pool_php_rush", "gecko", "geckosql");
            $stmt = $pdo->prepare("UPDATE users SET password = :new_password WHERE email = :email");
            $res = $stmt->execute(["email" => $email, "new_password" => $_passwd]);
        
            if ($res == true){ 
                if ($stmt->rowCount() == 1) { // renvoit le nombre de rst
                    header("Location: login.php", true, 302);
                    exit;
                } else {
                    echo "Bad answer - Please try again.";
                    display_email_form();
                    return;
                    }
            } else {
                echo "Bad answer - Please try again.";
                display_email_form();
                return;
            }
        } else {
            echo "Bad answer - Please try again.";
            display_email_form();
            return;
        }
    }
} else {
    display_email_form();
}

?>
</head>
</html>
