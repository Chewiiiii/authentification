<!DOCTYPE html>
    <html>
    <head></head>
    <body>
    <form action="" method="post">
        <h1>S'inscrire</h1>
        <input type="text" name="util" placeholder="Nom d'utilisateur" required />
        <input type="text" name="mail" placeholder="Email" required />
        <input type="password" name="mdp" placeholder="Mot de passe" required />
        <input type="submit" name="submit" value="S'inscrire" />
        <p>Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
    </form>
    <?php
        require('config.php');
        if (isset($_POST['util'], $_POST['mail'], $_POST['mdp'])){

            $pass = $_POST['mdp'] ;
            $hash = password_hash($pass,PASSWORD_BCRYPT) ;
            //string password_hash(string $pass, int $algo, array $options )

            $req=$connexion->prepare('INSERT INTO authentification(username,email,password) VALUES (:username, :email, :password")') ;
            $req->bindValue($_POST['util'],':username');
            $req->bindValue($_POST['mail'],':email');
            $req->bindValue($_POST['mdp'],':password');
            $req->execute();

            
            //$prep -> ("INSERT into authentification VALUES (null, ?, ?, ?)") ;
            
            
            if($prep){
                echo "<h3>Vous êtes inscrit avec succès.</h3>
                <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>";
            }
            

            
        }else{

            if(password_verify('admin', '$2a$10$GlvaE1qXuYE6O/ICVtPTeOf3QwE6QNB2quHgqpbK2JKzDYCNnyAL6')) {
                echo 'OK';
            } else {
                echo 'ERREUR';
            }
        }    

    ?>
    </body>
    </html>

