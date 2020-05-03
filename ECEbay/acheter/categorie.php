<?php

//débuter une session et se connecter à la base de données
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


?>

<?php

//recuperer l'id de la categorie en question (à afficher)
if(!empty($_GET['id'])) 
    {
        $id = $_GET['id'];
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
        
        <script type="text/javascript">
             $(document).ready(function(){
             $('.header').height($(window).height());
             });
        </script>
        <script>
                    function visibilite(thingId){
            var targetElement;
            var elements;
            targetElement = document.getElementById(thingId) ;

            // recupere tous les elements ayant pour nom de classe "Element"
            elements = document.getElementsByClassName("items")


            // parcoure tous ces elements et les cache
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = "none" ;
            }

            //affiche uniquement l element selectionné
            if (targetElement.style.display == "none") {
                    targetElement.style.display = "" ;
            }
        }
        </script>
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        <?php include '../template/header.php'; ?>
   
        <!-- titre de la categorie -->
        <div class="container-fluid">
        
        <div class="titrecat">
        <?php 
                    $db = Database::connect();
                   $statement = $db->prepare('SELECT categorie.nom FROM categorie WHERE categorie.id=?');
                    $statement->execute(array($id));
                    while ($categorie = $statement->fetch()) 
                    {
                 
                        echo $categorie['nom'];
                    }

                Database::disconnect();
                    ?>
            <div class="separation"></div>
        </div>
            <!-- html de la recherche-->
        <div class="container-fluid">
             <div class="recherche">
            </br>
             <form class="form" role="form" action="rechercher.php" methode="post" >
                   <input type="text" class="form-control" id="recherche" name="recherche" placeholder="recherche" value="">
               </form>
        </div>
        
        </br></br>
        
        <!-- liste d'items -->
    
        <div>
            <div class="row">
                <div class="col-md-2">
                    </br>
                <!-- liste des trois types à choisir-->
                    <ul style="list-style:none;">
                        <li><a type="button" class="btn-vue" onclick="visibilite('1');">Achats immédiats</a></li>
                        <li><a type="button" class="btn-vue" onclick="visibilite('2');">Enchères</a></li>
                        <li><a type="button" class="btn-vue" onclick="visibilite('3');">Meilleurs offres</a></li>
                    </ul>
                
                </br>
            </div>
            
            <div class="col-md-10">
  
                 
                <div id="1" class="items" >
                    <h4>Achats immédiats</h4>
                    <div class="separation"></div>
                    </br>
                    <div class="row">
                    <!-- recuppération des informations pour l'item en question-->
                   <?php 
                    $db = Database::connect();
                   $statement = $db->prepare('SELECT article.image, article.nom, article.prix, article.id FROM article WHERE categorie=? AND type=1');
                    $statement->execute(array($id));
                    while ($article = $statement->fetch()) 
                    {
                 //affichage des informations récupérées
                        echo '<div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img class="imgobj" src="../images/'.$article['image'].'">
                    <div class="description">
                        <span class="titre_objet">'.$article['nom'].'</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">'.$article['prix'].'€</span>
                        <br>
                        <br>
                        <a href="objet.php?id='.$article['id'].'" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> ';
                    
                    }
                //deconnexion à la base de données
                Database::disconnect();
                    ?>
                
                
                </div> </div>
                <!-- même principe mais pour l'item 2-->
                <div id="2" class="items" style="display: none;">
                    <h4>Enchères</h4>
                    <div class="separation"></div>
                    </br>

                 <div class="row">
                    
                   <?php 
                    //connexion à la base de données
                    $db = Database::connect();
//selection des items utiles
                   $statement = $db->prepare('SELECT article.image, article.nom, article.prix, article.id FROM article WHERE categorie=? AND type=2');
                    $statement->execute(array($id));
                    
                    while ($article = $statement->fetch()) 
                    {
                 //affichage ligne par ligne de chaque item et de ses infos
                        echo '<div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img class="imgobj" src="../images/'.$article['image'].'">
                    <div class="description">
                        <span class="titre_objet">'.$article['nom'].'</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">'.$article['prix'].'</span>
                        <br>
                        <br>
                        <a href="objet.php?id='.$article['id'].'" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> ';
                    
                    }
                //deconnexion base de données
                Database::disconnect();
                    ?>
                
                
                </div>
                
                
                </div> 
<!-- même chose mais pour la derniere catégorie-->
                <div id="3" class="items" style="display: none;">
                <h4>Meilleurs offres</h4>
                    <div class="separation"></div>
                    </br>

                 <div class="row">
                    <!--connexion et récupération des info des articles choisis-->
                   <?php 
                    $db = Database::connect();
                   $statement = $db->prepare('SELECT article.image, article.nom, article.prix, article.id FROM article WHERE categorie=? AND type=3');
                    $statement->execute(array($id));
                    
                    while ($article = $statement->fetch()) 
                    {
                 //affichage ligne par ligne
                        echo '<div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img class="imgobj" src="../images/'.$article['image'].'">
                    <div class="description">
                        <span class="titre_objet">'.$article['nom'].'</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">'.$article['prix'].'</span>
                        <br>
                        <br>
                        <a href="objet.php?id='.$article['id'].'" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> ';
                    
                    }
                //deconnexion base de données
                Database::disconnect();
                    ?>
                
                
                </div>
                
                
                </div> 
            
            </div>
    
        </div>
     </div>
 </div>
    </div>
            
        </div>
        
        <!-- partie recherche -->
        
       
        

        
        </br></br>
        
    <!-- template du footer-->   
<?php include '../template/footer.php'; ?>
        
    </body>
</html>