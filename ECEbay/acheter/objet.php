<?php

//session et connexion à la base de données
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

//recupe de l'id envoyé pour identifier l'article
if(!empty($_POST)) 
    {
        $id2 = $_POST['id'];
        
        //si un acheteur est connecté...
        if (isset($_SESSION['id']) && isset($_SESSION['acheteur']))
                {
                    $db = Database::connect();
                    $statement = $db->prepare("INSERT INTO panier (numpanier, article) values(?, ?)");
                    $statement->execute(array($_SESSION['id'], $id2));
                    Database::disconnect();
            header("Location: ../acheteur/Panier.php");

                }
                else{
                    header("Location: ../acheteur/connexionAcheteur.php");
                }
    }

//sinon...
else{
    if(!empty($_GET['id'])) 
    {
        $id3 = $_GET['id'];
    }
     //recupération des infos de l'article en question (son nom sa photo sa descrption ...)
    $db = Database::connect();
    $statement = $db->prepare("SELECT article.id, article.image, article.nom, article.description, article.prix, article.type, article.vendeur, article.categorie FROM article WHERE article.id = ?");
    $statement->execute(array($id3));
    $article = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

}

    

?>
<!-- html de la page-->
<!DOCTYPE html>
<html>
    <head>
        <title>ECEbay</title>
        
        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="acheter.css">
        
       
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
    <?php include '../template/header.php'; ?>


<!-- <div class="container"> </div> rajouter des marges -->
        <div class="container-fluid">
        
        <div class="titrecat">
        <?php 
                //verifier le type de l'article    
                        if($article['type'] == 1){
                            echo 'Achat immédiat';
                        }
                        if($article['type'] == 2){
                            echo 'Enchère';
                        }
                        if($article['type'] == 3){
                            echo 'Meilleur offre';
                        }
                 
                    ?>
            <div class="separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
            
            <!-- affichage des informations de l'article-->
                <div class="row">
            

                <div class="col-md-5">
                    
                    <br> <br><br>
                    <div align=center>
                    <img class= "img-responsive img text-center" src="../images/<?php echo $article['image']; ?>" style="width:250px;height:250px">
                    </div>
    
                
                </div>


                <div class="col-md-7">
                <p class="titre_item"> <?php echo $article['nom']; ?> </p>
                <br>
       
                <br>
                <p class="texte_item"> <b> description :</b> <?php echo $article['description']; ?> </p>
                <br>
                <p class="texte_item"> <b> Vendeur : </b> <?php 
                        //selectionner le vendeur de l'article
                            $db = Database::connect();
                            $statement2 = $db->prepare("SELECT vendeur.id, vendeur.pseudo FROM vendeur WHERE vendeur.id = ?");
                            $statement2->execute(array($article['vendeur']));
                            $vendeur = $statement2->fetch();
                            Database::disconnect();
                            echo $vendeur['pseudo'];
    
                    ?> </p>
                <br>
                <p class="texte_item"> 
                    
                    <?php 
                    //différentes options en fonction du prix                 
                    
                    if(isset($_SESSION['id']) && isset($_SESSION['acheteur'])){
                        $statement9 = $db->prepare("SELECT acheteur.id, acheteur.solde FROM acheteur WHERE acheteur.id = ?");
                        $statement9->execute(array($_SESSION['id']));
                        $acheteur = $statement9->fetch();
                        if($acheteur['solde'] < $article['prix']){
                            echo 'votre solde est insuffisant...';
                        }
                        else{
                            
                            if($article['type'] == 1)
                    {
                        echo '<b> Prix : </b> '.$article['prix'].'€</p>
                        <br> <br>
                    <form class="form" action="objet.php?id='.$article["id"].'" role="form" method="post">
                    <input type="hidden" name="id" value="'.$article["id"].'"/>
                    
                    <div class="form-actions">
                      <button type="submit" class="btn_bg btn_text" >Ajouter au panier</button>

                    </div>
                </form>
                        ';
                    }
                    elseif($article['type'] == 2)
                    {
                        $statement124 = $db->prepare('SELECT montantmax, id, idacheteur, MAX(montantmax) FROM enchere WHERE iditem= ?');
                        $statement124->execute(array($article['id']));
                        $montant = $statement124->fetch(); 
                        
                        if(!empty($montant['montantmax'])){
                            echo '<b> Valeur enchère actuelle : </b> '.$montant['montantmax'].'€</p>';
                        }
                        else{
                            echo '<b> Valeur enchère actuelle : </b> 0 enchère</p>';
                        }
                        
                        echo '<br> <br>
                <a href="../acheteur/enchere.php?id='.$article['id'].'" class="btn_bg btn_text">Enchérir </a>';
                    }
                    elseif($article['type'] == 3)
                    {
                        
                       echo '<b> Prix de départ : </b> '.$article['prix'].'€</p>
                        <br> <br>
                <a href="../acheteur/offre.php?id='.$article['id'].'" class="btn_bg btn_text">Faire une offre </a>';
                    }
                        
                        }
                    }
                    else{
                        
                        if($article['type'] == 1)
                    {
                        echo '<b> Prix : </b> '.$article['prix'].'€</p>
                        <br> <br>
                    <form class="form" action="objet.php?id='.$article["id"].'" role="form" method="post">
                    <input type="hidden" name="id" value="'.$article["id"].'"/>
                    
                    <div class="form-actions">
                      <button type="submit" class="btn_bg btn_text" >Ajouter au panier</button>

                    </div>
                </form>
                        ';
                    }
                    elseif($article['type'] == 2)
                    {
                        
                        $statement124 = $db->prepare('SELECT montantmax, id, idacheteur, MAX(montantmax) FROM enchere WHERE iditem= ?');
                        $statement124->execute(array($article['id']));
                        $montant = $statement124->fetch(); 
                        
                        if(!empty($montant['montantmax'])){
                            echo '<b> Valeur enchère actuelle : </b> '.$montant['montantmax'].'€</p>';
                        }
                        else{
                            echo '<b> Valeur enchère actuelle : </b> 0 enchère</p>';
                        }
                        
                        
                       
                        echo '<br> <br>
                <a href="../acheteur/enchere.php?id='.$article['id'].'" class="btn_bg btn_text">Enchérir </a>';
                    }
                    elseif($article['type'] == 3)
                    {
                        echo '<b> Prix de départ : </b> '.$article['prix'].'€</p>
                        <br> <br>
                <a href="../acheteur/offre.php?id='.$article['id'].'" class="btn_bg btn_text">Faire une offre </a>';
                    }
                    
                    
                    }

                ?>


                </div>


                </div>

            
           
    </div>


            </div>
<br> <br><br><br>



    <!-- template du footer de la page-->    
<?php include '../template/footer.php'; ?>
    </body>
</html>