    <?php
        include("config.php");

      
        try
        {
            $bdd = new PDO('mysql:host='.$adresseServeur.';dbname='.$nomBaseDeDonnees.';charset=utf8', $nomUtilisateur, $motDePasse);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch (PDOException $e)
        {

            die('Erreur : ' . $e->getMessage());
        }
    ?>