<?php
 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
{
    $id=$_SESSION['id'];
   
}
elseif(isset($_SESSION['id']) && isset($_SESSION['admin'])){
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
        $id2 = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT article.id, article.image, article.nom, article.description, article.prix, article.type, article.categorie FROM article WHERE article.id = ?");
    $statement->execute(array($id2));
    $article = $statement->fetch();
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
        
    <link rel="stylesheet" href="gestionarticle.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Article
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                <p><b>Image:</b></p>
                   </br>
                    <img src ="../images/<?php echo $article['image'];?>" style="width:225px; height:225px;">
                   </br></br>
                <p><b>Nom:</b><?php echo '  '.$article['nom'];?></p>
               </br>
                <p><b>Description:</b><?php echo '  '.$article['description'];?></p>
                    </br>
                <p><b>Type:</b>
                    
                    <?php 
                        
                        if($article['type'] == 1)
                        {
                            echo '  Achat immédiat';
                        }
                        elseif($article['type'] == 2)
                        {
                            echo '  enchère';
                        }
                        else
                        {
                            echo '  meilleur offre';
                        }

                    ?></p>
                    </br>
                <p><b>Catégorie:</b>
                    
                    <?php 
                        
                        if($article['categorie'] == 1)
                        {
                            echo '  Frérailles et Trésors';
                        }
                        elseif($article['categorie'] == 2)
                        {
                            echo '  Bon Musées';
                        }
                        else
                        {
                            echo '  Article VIP';
                        }

                    ?></p>

                    </br>
                <p><b>Prix:</b><?php echo '  '.$article['prix'];?>€</p>
                   
                    <?php 
                        
                        if($article['type'] == 3)
                        {
                            echo '<table class="table table-stripped">
                            <thead style="text-align:center">
                                <tr>
                                    <th>Offre</th>
                                    <th>Choix</th>
                   
                                </tr>


                            </thead>
                            <tbody>';
                             
                                $db = Database::connect();
                                $statement2 = $db->prepare('SELECT negociation.id, negociation.offre FROM negociation WHERE negociation.iditem = ? ORDER BY negociation.id ');
                            $statement2->execute(array($article['id']));
                            
                                while($nego = $statement2->fetch()) 
                                {
                                    echo '<tr style="text-align:center">';
                                    echo '<td>'. $nego['offre'] . '€</td>';
                                    

                                    echo '<td>';
                                    echo '<a type="button" class="btn btn-info" href="">Oui</a>';
                                    echo ' ';
                                    echo '<a type="button" class="btn btn-danger" href="">Non</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                Database::disconnect();
                      
                            echo '</tbody>
                            </table>';
                        }
                    ?>
                    </br></br>
                <a type="button" class="btn btn-warning" href="modifierArticle.php?id=<?php echo $id2; ?>">Modifier</a>
                <a type="button" class="btn btn-danger" href="supprimerArticle.php?id=<?php echo $id2; ?>">Supprimer</a>
               </div>
               
                <div class="col-md-6">   
                     <div class="item">
                    <img class="imgobj" src ="../images/<?php echo $article['image'];?>">
                    <div class="description">
                        <h2><?php echo $article['nom'];?></h2>
                        <p><?php echo $article['prix'];?>€</p>
                        <a href="" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                </div>
                    
           </div>
        
    </div>
        

        </br></br>

        
        
       <?php include '../template/footer.php'; ?>


        
    </body>
</html>