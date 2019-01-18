    <?php 

        echo "1";
        try {
        $bdd = new PDO('mysql:host=localhost; dbname=ecosystem; charset=utf8','root','root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

echo $_POST['lastname'];
    if (isset($_POST['lastname'])&&isset($_POST['name'])&&isset($_POST['date'])&&isset($_POST['telephone'])&&isset($_POST['mail'])&&isset($_POST['mail_confirmation'])&&isset($_POST['password'])&&isset($_POST['password_confirmation'])&&isset($_POST['securityQuestion'])&&isset($_POST['securityResponse'])) {
      echo "3";
      $password= hash('sha256', $_POST['password'], $_POST['password_confirmation'] );
echo "4";
      if ($_POST['password'] != $_POST['password_confirmation']) {
        echo "Les mots de passe ne concordent pas, veuillez modifier";
        return false;
    echo "passe";    
        }
echo "5";
      if($_POST['password'] === $_POST['password_confirmation']){
echo "envoie";
        // utilisation de la methode inscription avec les champs du formulaire avec creation des comptes dans la BDD
       
 
 $stmt = $bdd->prepare('INSERT INTO `utilisateur` ( `nom`, `prenom`, `date_naissance`,`tel_portable`,`mail`,`mot_de_passe`,`question_securite`,
              `reponse_securite`) VALUES(:nom,:prenom,:date_naissance,:tel_portable,:mail,:mot_de_passe,:question_securite,:reponse_securite)');
// bindParam chercher et remplacer            
            $stmt->bindParam(':nom', $_POST['lastname']);
            $stmt->bindParam(':prenom', $_POST['name']);
            $stmt->bindParam(':date_naissance', $_POST['date']);
            $stmt->bindParam(':tel_portable', $_POST['telephone']);
            $stmt->bindParam(':mail', $_POST['mail']);
            $stmt->bindParam(':mot_de_passe', $password);
            $stmt->bindParam(':question_securite', $_POST['securityQuestion']);
            $stmt->bindParam(':reponse_securite', $_POST['securityResponse']);
//execute la requete
            $stmt->execute();   

            echo "fini";        
      }
      
    }

    function inscription($nom, $prenom, $date_naissance, $tel_portable, $mail, $mot_de_passe, $question_securite, $reponse_securite){

            
        }
    ?>