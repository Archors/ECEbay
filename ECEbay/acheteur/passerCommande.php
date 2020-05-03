<?php
  //co à la base données
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
        $statement = $db->prepare('SELECT * FROM panier WHERE panier.numpanier = ?');
        $statement->execute(array($id));
        
        
                        while($panier = $statement->fetch()) 
                        {
                            
                            $statement3 = $db->prepare('SELECT * FROM article WHERE article.type =1 AND article.id = ?');
                            $statement3->execute(array($panier['article']));
                            $article = $statement3->fetch();
                            
                            $statement5 = $db->prepare('SELECT acheteur.solde FROM acheteur WHERE acheteur.id = ?');
                            $statement5->execute(array($id));
                            $acheteur = $statement5->fetch();
                            $newsolde= $acheteur['solde']-$article['prix'];
                            
                            $statement7 = $db->prepare("UPDATE acheteur set solde = ? WHERE id = ?");
                            $statement7->execute(array($newsolde,$id));
                            
                            $statement4 = $db->prepare("DELETE FROM panier WHERE panier.article = ?");
                            $statement4->execute(array($article['id']));
                             $statement2 = $db->prepare("DELETE FROM article WHERE article.type =1 AND id = ?");
                            $statement2->execute(array($panier['article']));
                            

                        }
        Database::disconnect();


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

    <link rel="stylesheet" href="gestionarticle.css">
        
    </head>
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Commande
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container validation">
            <div class="row">

                
                    <h4>Votre commande à bien été passée !!!</h4>
                    </br></br></br></br></br></br></br></br></br></br>
       
            </div>
        </div>   
                    

         

        </br></br>

        <!-- footer -->
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>