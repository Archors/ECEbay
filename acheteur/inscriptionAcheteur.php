<?php

 session_start();                 
 


class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "ecebay";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}

$pseudoError = $mailError = $passwordError= $nomError= $prenomError = $pseudo = $mail = $password= $nom = $prenom = "";
    
    
    if(!empty($_POST)) 
    {
        $pseudo               = checkInput($_POST['pseudo']);
        $nom               = checkInput($_POST['nom']);
        $mail               = checkInput($_POST['mail']);
        $prenom                 = checkInput($_POST['prenom']);
        $password              = checkInput(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $isSuccess          = true;
        

        
        if(empty($pseudo)) 
        {
            $pseudoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(!empty($pseudo)) 
        {
             $db = Database::connect();
            $statement2 = $db->query('SELECT acheteur.pseudo FROM acheteur');
                        while($acheteur2 = $statement2->fetch()) 
                        {
                            if($acheteur2['pseudo'] == $pseudo){
                                $pseudoError = 'Ce pseudo est déjà utilisé';
                                $isSuccess = false;
                            }
                            
                        }
                        Database::disconnect();

            
        }
        
        if(empty($mail)) 
        {
            $mailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailError = "Invalid email format";
            $isSuccess = false;
        }

        if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        
        if(empty($nom)) 
        {
            $imageprofilError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($prenom)) 
        {
            $imageprofilError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
       
        
        
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO acheteur (pseudo, mail, password, prenom, nom) values(?, ?, ?, ?, ?)");
            $statement->execute(array($pseudo, $mail,$password,$prenom,$nom));
            Database::disconnect();


            header("Location: ../accueil/accueil.php");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>ECEbay</title>
        
        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        

    <link rel="stylesheet" href="admin.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Inscription
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
            <form class="form" action="inscriptionAcheteur.php" role="form" method="post" enctype="multipart/form-data">
           <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo;?>">
                        <span class="help-inline"><?php echo $pseudoError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">mail:</label>
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail" value="<?php echo $mail;?>">
                        <span class="help-inline"><?php echo $mailError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                        <span class="help-inline"><?php echo $passwordError;?></span>
                    </div>
                   </div>
                <div class="col-md-6">  
                    </br>
                     <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                </div>
               
                <div class="form-actions"  style="margin:0 auto">
                        <button type="submit" class="btn btn-success"></span> Ajouter</button> 
                   </div>
               </div>
                   
            </form>                             
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>