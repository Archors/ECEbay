<?php session_start(); 
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

<!DOCTYPE html>
<html>

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


<body>



    <?php include '../template/header.php'; ?>


    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            
        </div>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
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
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev" role="button">
                    <span class="fas fa-chevron-left fa-2x"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next" role="button">
                    <span class="fas fa-chevron-right fa-2x"></span>
                </a>

            </div>
        </div>

    </section>


    <div class="container-fluid">
        </br>
        <h3 style="text-align:center">Articles recommandés</h3>
     <div class="container separation"></div>
        </br>
        <div class="items">
            <div class="row">
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

    <div class="container-fluid" style="background-color:#000">
        <br>
        <h3 style="text-align:center; color:white">Une question ou un retour ?</h3>
        <br>
        <div class="container">
            <div class="form-group "> <input type="text " class="form-control " placeholder="Votre nom: " name=" "> </div>
            <div class="form-group "> <input type="email " class="form-control " placeholder="Courriel: " name="email "> </div>
            <div class="form-group "> <textarea class="form-control " rows="4 ">Vos commentaires</textarea> </div>
            <input type="submit " class="btn btn-secondary btn-block " value="Envoyer " name=" ">

        </div>

        <br><br>
    </div>

    <div class="container">
        <br>

        <div class="row ">
            <div class="col-md-4">
                <div class="info">
                <img src="">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
</div>
            
            </div>
            <div class="col-md-4">
                <div class="info">
                <img src="">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
</div>
                
            </div>
            <div class="col-md-4">
                <div class="info">
                <img src="">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
</div>
              
            </div>
        </div>
  
        <br><br>
    </div>

    <?php include '../template/footer.php'; ?>



</body>



</html>

