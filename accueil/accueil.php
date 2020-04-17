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
            <h2>Principe</h2>
        </div>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <center><img class="d-block" src="images/expo.png" alt="First slide"></center>
                    <br><br>
                </div>
                <div class="carousel-item">
                    <center><img class="d-block" src="images/expo2.png" alt="Second slide"></center>
                    <br><br>
                </div>

                <div class="carousel-item">
                    <center><img class="d-block" src="images/expo3.png" alt="Third slide"></center>
                    <br><br>

                </div>
                <div class="carousel-item">
                    <center><img class="d-block" src="images/expo4.png" alt="Fourth slide"></center>
                    <br><br>

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

    <div class="container-fluid" style="background-color:#A09776">
        <br>
        <h3 style="text-align:center">Une question ou un retour ?</h3>
        <br>
        <div class="container">
            <div class="form-group "> <input type="text " class="form-control " placeholder="Votre nom: " name=" "> </div>
            <div class="form-group "> <input type="email " class="form-control " placeholder="Courriel: " name="email "> </div>
            <div class="form-group "> <textarea class="form-control " rows="4 ">Vos commentaires</textarea> </div>
            <input type="submit " class="btn btn-secondary btn-block " value="Envoyer " name=" ">

        </div>

        <br><br>
    </div>

    <?php include '../template/footer.php'; ?>



</body>



</html>