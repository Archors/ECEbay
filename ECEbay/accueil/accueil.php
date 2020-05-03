<!-- connexion à la base de donnée -->

<?php 

//debuter une session pour vérifier si l'utilisateur est connecté

session_start(); 

//connexion à la base de donnée

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
    
    function enchere(){
        $db = Database::connect();
        $statement1 = $db->query('SELECT * FROM article WHERE type = 2 AND date < NOW()');
        $nvvaleur;
 
        
        while($article = $statement1->fetch()){
        
            $statement2 = $db->prepare("SELECT id FROM enchere WHERE iditem=?");
            $statement2->execute(array($article['id']));
            $encheres = $statement2->fetch();
            $nb=count($encheres);
       

            if($nb == 2){
                $statement3 = $db->prepare('SELECT id, idacheteur, MAX(montantmax) FROM enchere WHERE iditem= ?');
                $statement3->execute(array($article['id']));
                $gagnant = $statement3->fetch();               
                
                $statement5 = $db->prepare('SELECT * FROM acheteur WHERE id= ?');
                $statement5->execute(array($gagnant['idacheteur']));
                $acheteur = $statement5->fetch();
                
                $nvvaleur = $acheteur['solde'] - $article['prix'];
                
                $statement4 = $db->prepare("UPDATE acheteur set solde = ?, enchere = ? WHERE id = ?");
                $statement4->execute(array($nvvaleur,$article['nom'], $gagnant['idacheteur']));
                
                $statement6 = $db->prepare("DELETE FROM panier WHERE article = ?");
                $statement6->execute(array($article['id']));
                
                $statement7 = $db->prepare("DELETE FROM enchere WHERE iditem = ?");
                $statement7->execute(array($article['id']));
                
                $statement8 = $db->prepare("DELETE FROM article WHERE id = ?");
                $statement8->execute(array($article['id']));
                
                
           }
            elseif($nb == 0 || $nb ==1)
            {
                $statement8 = $db->prepare("DELETE FROM article WHERE id = ?");
                $statement8->execute(array($article['id']));
            }
            else{
                $statement3 = $db->prepare('SELECT id, idacheteur, MAX(montantmax) FROM enchere WHERE iditem= ?');
                $statement3->execute(array($article['id']));
                $gagnant = $statement3->fetch();  
                
                $statement6 = $db->prepare("DELETE FROM enchere WHERE id = ?");
                $statement6->execute(array($gagnant['id']));
                
                $statement5 = $db->prepare('SELECT * FROM acheteur WHERE id= ?');
                $statement5->execute(array($gagnant['idacheteur']));
                $acheteur = $statement5->fetch();
                
                $statement10 = $db->prepare('SELECT id, MAX(montantmax) FROM enchere WHERE iditem= ?');
                $statement10->execute(array($article['id']));
                $perdant = $statement10->fetch();
                
                $nvvaleur = $acheteur['solde'] - $perdant['montantmax']+1;
                
                $statement4 = $db->prepare("UPDATE acheteur set solde = ?, enchere = ? WHERE id = ?");
                $statement4->execute(array($nvvaleur,$article['nom'], $gagnant['idacheteur']));
                
                $statement6 = $db->prepare("DELETE FROM panier WHERE article = ?");
                $statement6->execute(array($article['id']));
                
                $statement7 = $db->prepare("DELETE FROM enchere WHERE iditem = ?");
                $statement7->execute(array($article['id']));
                
                $statement8 = $db->prepare("DELETE FROM article WHERE id = ?");
                $statement8->execute(array($article['id']));
            }
        }
        

            
  
        
       Database::disconnect(); 
    }
    
    
    enchere();

?>


<!-- affichage de la page -->
<!DOCTYPE html>
<html>
<!-- head de la page -->
<head>
    <title>ECEBay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.header').height($(window).height());
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Intégration d'un librairie d'icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="accueil.css">
</head>

<!-- body de la page -->
<body>

<!-- inclusion des template de la partie template (header et footer) -->

    <?php include '../template/header.php'; ?>

<!-- caroussel de la page d'accueil -->
    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            
        </div>
        <!-- image active du caroussel -->
        <div id="carousel_ECEBay" class="carousel slide text-center" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel_ECEBay" data-slide-to="0" class="active"></li>
                <li data-target="#carousel_ECEBay" data-slide-to="1"></li>
                <li data-target="#carousel_ECEBay" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"> 
                    <img src="../images/carousel1.png">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <div class="carousel_carre"> <a href="../acheter/categorie.php?id=1">
                                        <span class="carousel_titre"> Découvrir </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
<!-- deuxieme image-->
                <div class="carousel-item"> 
                    <img src="../images/carousel2.png">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <div class="carousel_carre"> <a href="../acheter/categorie.php?id=2">
                                        <span class="carousel_titre"> Découvrir </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
<!-- troisieme image -->
                <div class="carousel-item "> 
                    <img src="../images/carousel3.png">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <div class="carousel_carre"> <a href="../acheter/categorie.php?id=3">
                                        <span class="carousel_titre"> Découvrir </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <a class="carousel-control-prev" href="#carousel_ECEBay" data-slide="prev" role="button">
                    <span class="fas fa-chevron-left fa-2x"></span>
                </a>
                <a class="carousel-control-next" href="#carousel_ECEBay" data-slide="next" role="button">
                    <span class="fas fa-chevron-right fa-2x"></span>
                </a>

            </div>
        </div>

    </section>

<!-- suite de la page d'accueil -->
    <div class="container-fluid">
        </br>
        <h3 style="text-align:center">Articles recommandés</h3>
     <div class="container separation"></div>
        </br>
        <div class="items">
            <div class="row">
                <!-- connexion à la base de donnée pour récupérer les 4 premiers articles -->
                <?php
$db = Database::connect();
                $statement = $db->query('SELECT * FROM article LIMIT 8');
    
                    while ($article = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img class="imgobj" src="../images/'.$article['image'].'">
                        <div class="description">
                            <h2>'.$article['nom'].'</h2>
                            <p>'.$article['prix'].'‎€</p>
                            <a href="../acheter/objet.php?id='.$article['id'].'" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>';
                    }
                   
                Database::disconnect();
                echo  '</div>';
                
?>
                

            </div>

        </div>
        </br>
    </div>
<!-- formulaire inactif de la page d'accueil -->
    <div class="container-fluid" style="background-color:#000">
        <br>
        <h3 style="text-align:center; color:white">Une question ou un retour ?</h3>
        <br>
        <!-- formulaire -->
        <div class="container">
           <form>
            <div class="form-group "> <input type="text" class="form-control" placeholder="Votre nom:" name="nom"> </div>
            <div class="form-group "> <input type="email" class="form-control" placeholder="Courriel:" name="email "> </div>
            <div class="form-group"> <textarea class="form-control" rows="4"> </textarea> </div>
            <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
        </form>


        </div>

        <br><br>
    </div>
<!-- contrat avec nos clients, sécurité et satisfaction -->
    <div class="container">
        <br>

        <div class="row ">
            <div class="col-md-4">
                <div class="info">
                
                <p><b>Tous vos paiements sont sécurisés par une redirection sur le site de votre banque</b> </p>
</div>
            
            </div>
            <div class="col-md-4">
                <div class="info">
                
                <p> <b>Vous êtes livrés en 2 jours sans frais suplémentaire</b></p>
</div>
                
            </div>
            <div class="col-md-4">
                <div class="info">
                
                <p> <b>100% satisfait ou remboursé sous 30 jours et 50% sous 60 jours</b></p>
</div>
              
            </div>
        </div>
  
        <br><br>
    </div>
<!-- page footer -->
    <?php include '../template/footer.php'; ?>



</body>



</html>

