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
     
    

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

$total=0;

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
        
    <link rel="stylesheet" type="text/css" href="acheteur.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Votre Panier
            <div class="container separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-6">
                    <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Valeur</th>
                            
                        </tr>
                       
                        
                    </thead>
                    <tbody>
                     <?php
                        $db = Database::connect();
                        $statement = $db->prepare("SELECT panier.id, panier.article FROM panier WHERE panier.numpanier = ?");
                        $statement->execute(array($id));
                        while($panier = $statement->fetch()) 
                        {
                              echo 'salut';      
                        $statement2 = $db->prepare("SELECT article.id, article.image, article.nom, article.prix FROM article WHERE article.id = ?");
                        $statement2->execute(array($panier["article"]));
                             $article = $statement2->fetch();
                            echo '<tr>';
                            echo '<td><img src="../images/'.$article['image'].'" style="width:50px; height:50px"></td>';
                            echo '<td>'. $article['nom'] . '</td>';
                            echo '<td>'. $article['prix'] . '€</td>';

                            echo '</tr>';
                            $total=$total+$article['prix'];
                        }
                        Database::disconnect();
                      ?>
                    </tbody>
                </table>
                
                </div>
                
                <div class="col-md-2" style="margin:0 auto">
                    <div class="totalpanier">
                        <h4>total : <?php echo $total; ?>€</h4>
                        </br>
                    <?php
                        $db = Database::connect();
                        $statement3 = $db->prepare("SELECT acheteur.id, acheteur.ville FROM acheteur WHERE acheteur.id = ?");
                        $statement3->execute(array($id));
                        $acheteur = $statement3->fetch();
                        Database::disconnect();
                        if(!empty($acheteur['ville']))
                        {
                            echo'<a href="passerCommande.php" class="passercommande">Passer commande</a>';
                        }
                        else
                        {
                            echo'<a href="formulaireCommande.php" class="passercommande">Passer commande</a>';
                        }

                    ?>
                        
                        
                    </div>
                
                </div>
                
        
            
            </div>    
            
        </div>
        

        </br></br>

        </div>
        


       <?php include '../template/footer.php'; ?>


        
    </body>
</html>