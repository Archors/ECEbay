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

        <div class="heading">
            
        </div>
        <!-- On construit un carousel sous forme de slide qui changera de visuel toutes les 50s -->
        <div id="carousel_ECEBay" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- on définit ce que contient ce carousel -->
            <ol class="carousel-indicators">
                <li data-target="#carousel_ECEBay" data-slide-to="0"class="active"> </li>
                <li data-target="#carousel_ECEBay" data-slide-to="1"> </li>
                <li data-target="#carousel_ECEBay" data-slide-to="2"> </li>

            </ol>

            <div class="carousel-inner">
                <!-- Le caroussel apparaîtra avec l'image suivante -->
                <div class="carousel-item active"> 
                    <img src="../images/carousel1.png">
                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <div class="carousel_carre"> <a href="../acheter/vip.php">
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
                                    <div class="carousel_carre"> <a href="../acheter/musee.php">
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
                                    <div class="carousel_carre"> <a href="../acheter/ferraille.php">
                                        <span class="carousel_titre"> Découvrir </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>  

            </a>
        </div>



<br> <br> <br> <br>
    <div class="container-fluid">
        </br>
        <h3 style="text-align:center">Articles recommandés</h3>
     <div class="container separation"></div>
        </br>
        <div class="items">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="../images/coffre.jpg" class="imgobj">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>
                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="coffre.jpg">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>
                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="coffre.jpg">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>
                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="coffre.jpg">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>
                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="coffre.jpg">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>
                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                        <img src="coffre.jpg">
                        <div class="description">
                            <h2>titre</h2>
                            <p>type de vente</p>

                            <a href="" class="btn btn-order" role=button>Voir</a>
                        </div>
                    </div>
                    </br>
                </div>

            </div>

        </div>
        </br>
    </div>

    <div class="container-fluid" style="background-color:#394351">
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