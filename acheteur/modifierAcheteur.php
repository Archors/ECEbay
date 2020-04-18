<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['acheteur']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: connexionAcheteur.php");
}


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


 if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }


$pseudoError = $mailError = $passwordError = $pseudo = $mail = $password =$nomError = $nom = $prenomError = $prenom = "";
    
    
    if(!empty($_POST)) 
    {
        $pseudo               = checkInput($_POST['pseudo']);
        $mail        = checkInput($_POST['mail']);
        
        $nom             = checkInput($_POST['nom']);
        $prenom             = checkInput($_POST['prenom']); 
        $isSuccess          = true;


        
        if(empty($pseudo)) 
        {
            $pseudoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
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
          
        
        if($isSuccess) 
        {
            
                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE acheteur set pseudo = ?, mail = ?, nom = ?, prenom = ? WHERE id = ?");
                    $statement->execute(array($pseudo,$mail,$nom,$prenom,$id));
                    Database::disconnect();
                    header("Location: profilAcheteur.php");
    
        }
    }


    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM acheteur where id = ?");
        $statement->execute(array($id));
        $acheteur = $statement->fetch();
        $pseudo          = $acheteur['pseudo'];
        $mail    = $acheteur['mail'];
        
        $nom       = $acheteur['nom'];
        $prenom          = $acheteur['prenom'];
        Database::disconnect();
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
        Modifier Profil

            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
            <form class="form" action="modifierAcheteur.php" role="form" method="post" enctype="multipart/form-data" >
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
                    
                   </div>
               <br>
                <div class="col-md-6">  
                    
                     <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>
                   
                    <br>
                </div>
               
                <div class="form-actions">
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        
                   </div>
               </div>
                   
               </form>
            
        </div>   
                    
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>