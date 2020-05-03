<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['admin']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: connexionAdmin.php");
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
        $id2 = checkInput($_GET['id']);
    }
//si le formulaire a été envoyé
    if(!empty($_POST)) 
    {
        $id2 = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM article WHERE vendeur = ?");
        $statement->execute(array($id2));
        $article = $statement->fetch();
        
        $statement2 = $db->prepare("DELETE FROM panier WHERE article = ?");
        $statement2->execute(array($article['id']));
        
        $statement3 = $db->prepare("DELETE FROM article WHERE vendeur = ?");
        $statement3->execute(array($id2));
            
        $statement4 = $db->prepare("DELETE FROM vendeur WHERE id = ?");
        $statement4->execute(array($id2));
        Database::disconnect();
        header("Location: gestionVendeursAdmin.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!-- html -->
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
        Supprimer un vendeur
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container validationsup">
            <div class="row">

                <form class="form" action="supprimerVendeur.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id2;?>"/>
                    <h4>Etes vous sur de vouloir supprimer ce vendeur ?</h4>
                    </br>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-success">Oui</button>
                      <a class="btn btn-default" href="gestionVendeursAdmin.php">Annuler</a>
                    </div>
                </form>
            </div>
        </div>   
                    
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>



