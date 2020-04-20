<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: connexionVendeur.php");
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


        $statement = $db->prepare("SELECT vendeur.id, vendeur.pseudo, vendeur.mail, vendeur.photoprofil, vendeur.photofond FROM vendeur WHERE vendeur.id = ?");
    $statement->execute(array($id));
    $vendeur = $statement->fetch();
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
        
    <link rel="stylesheet" href="gestionitems.css">
        <style>
    body{
        <?php echo 'background-image:url(../images/'.$vendeur["photofond"].');'; ?>
        background-repeat: no-repeat;
        background-size: cover; } 
</style>
        
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
               <div class="col-md-5">
                <img class="rounded-circle" src="../images/<?php echo $vendeur['photoprofil'];?>" style="width:225px; height:225px;">
                   </br></br>
                <p><b>Pseudo:</b> <?php echo ' '.$vendeur['pseudo'];?></p>
                
                <p><b>Mail:</b> <?php echo ' '.$vendeur['mail'];?></p> 
                
                <p><b>Image de fond:</b></p>
                <img src="../images/<?php echo $vendeur['photofond'];?>" style="width:300px; height:200px;">
           </br></br>
                <a class="btn btn-warning" style="margin:0 auto" href="modifierVendeur.php">Modifier</a>
                   </br></br>
               </div>
               
                <div class="col-md-7">   
                     <div class="listearticle">
                         
                         <table class="table table-stripped">
                            <thead style="text-align:center">
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Prix</th>
                            <th>Gestion</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                        $db = Database::connect();
                        $statement = $db->query('SELECT article.id, article.nom, article.categorie, article.prix, type.name  AS type FROM article LEFT JOIN type ON article.type = type.id  WHERE article.vendeur="'.$id.'" ORDER BY article.id ');
                        while($article = $statement->fetch()) 
                        {
                            echo '<tr style="text-align:center">';
                            echo '<td>'. $article['nom'] . '</td>';
                            echo '<td>'. $article['type'] . '</td>';
                            echo '<td>'. $article['prix'] . '</td>';
                            echo '<td>';
                            echo '<a type="button" class="btn btn-info" href="../gestionarticle/voirArticle.php?id='.$article['id'].'">Aperçu</a>';
                            
                            echo '</td></tr>';
    
                           
                        }
                        Database::disconnect();
                      ?>
                         
                    </tbody>
                 </table>
                    <a type="button" class="btn btn-primary ajouter" href="../gestionarticle/ajouterArticles.php">Ajouter</a>

                    </div>
                </div>
                 
                  
           </div>
    
    </div>
        

        </br></br>

        
        
       <?php include '../template/footer.php'; ?>


        
    </body>
</html>