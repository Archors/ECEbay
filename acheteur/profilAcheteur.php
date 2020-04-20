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


        $db = Database::connect();
        $statement = $db->prepare("SELECT acheteur.id, acheteur.pseudo, acheteur.nom, acheteur.prenom, acheteur.mail, acheteur.telephone, acheteur.pays, acheteur.ville, acheteur.codepostal, acheteur.adresse1, acheteur.adresse2, acheteur.typecarte, acheteur.nomcarte, acheteur.codecarte, acheteur.datecarte FROM acheteur WHERE acheteur.id = ?");
        $statement->execute(array($id));
        $acheteur = $statement->fetch();
        Database::disconnect();
    
     
    

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
        
    <link rel="stylesheet" href="acheteur.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Votre profil
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <div class="row">
               <div class="col-md-6">

                <p><b>Pseudo:</b> <?php echo ' '.$acheteur['pseudo'];?></p>
                
                <p><b>Nom:</b> <?php echo ' '.$acheteur['nom'];?></p>
                
                <p><b>Prénom:</b> <?php echo ' '.$acheteur['prenom'];?></p> 
                
                <p><b>Mail:</b> <?php echo ' '.$acheteur['mail'];?></p>
                <p><b>Téléphone:</b><?php echo ' '.$acheteur['telephone'];?></p>
                <p><b>Pays:</b> <?php echo ' '.$acheteur['pays'];?></p>
                <p><b>Ville:</b> <?php echo ' '.$acheteur['ville'];?></p>
                
                
           </br> </br>    
                   
               </div>
        <div class="col-md-6">
                <p><b>Code postal:</b> <?php echo ' '.$acheteur['codepostal'];?></p>
                <p><b>Adresse 1:</b> <?php echo ' '.$acheteur['adresse1'];?></p>
                
                <p><b>Adresse 2:</b> <?php echo ' '.$acheteur['adresse2'];?></p>
                
                <p><b>Type de carte:</b> <?php echo ' '.$acheteur['typecarte'];?></p> 
                
                <p><b>Nom de carte:</b> <?php echo ' '.$acheteur['nomcarte'];?></p>
                <p><b>Code de carte:</b><?php echo ' '.$acheteur['codecarte'];?></p>
                <p><b>Date de carte:</b> <?php echo ' '.$acheteur['datecarte'];?></p>
               
                
           </br> </br>    
                   
               </div>
           <a class="btn btn-warning" style="margin:0 auto" href="modifierAcheteur.php">Modifier</a>
        </br> 
           </div>
        
    
    </div>
        

        </br></br>

        
        
       <?php include '../template/footer.php'; ?>


        
    </body>
</html>