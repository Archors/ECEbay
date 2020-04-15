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
        
        <link rel="stylesheet" type="text/css" href="styleshtf.css">
        <link rel="stylesheet" type="text/css" href="stylesfront.css">
        
        <script type="text/javascript">
             $(document).ready(function(){
             $('.header').height($(window).height());
             });
        </script>
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
    <nav class="navbar navbar-expand-md">
     <a class="navbar-brand" href="accueil.php">Logo</a>
     <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="main-navigation">
     <ul class="navbar-nav">
     <li class="nav-item"><a class="nav-link" href="#">Catégories</a></li>
     <li class="nav-item"><a class="nav-link" href="#">Acheter</a></li>
     <li class="nav-item"><a class="nav-link" href="#">Vendre</a></li>
     <li class="nav-item"><a class="nav-link" href="#">Admin</a></li>
     <li class="nav-item"><a class="nav-link" href="#">Compte</a></li>
     <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Panier</a></li>
     </ul>
     </div>
    </nav>
        <!-- titre de la categorie -->
        <div class="container-fluid">
        
        <div class="titrecat">
        Achats immédiats
            <div class="container separation"></div>
        </div>
        
        <!-- partie recherche -->
        
        <div class="recherche">
            </br>
             <form class="form" role="form" action="" methode="post" >
                   <a href=""> <input type="text" class="form-control" id="recherche" name="recherche" placeholder="recherche" value=""></a>
               </form>
        </div>
        
        <!-- Achat immédiat -->
        
        <div class="typetitre">
            <h1>Trésors et Férailles</h1>
        </div>
        </br>
        
        <!-- liste d'items -->
        
        <div class="items">
            <div class="row">
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

        
        </br></br>
        
        <!-- Encheres -->
        
        <div class="typetitre">
            <h1>Bons pour le musée</h1>
        </div>
        
        <!-- liste d'items -->
        
        </br>
        
        <!-- liste d'items -->
        
        <div class="items">
            <div class="row">
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
                
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
     
                <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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

                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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

                <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
           
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
        
        </br></br>
        
        <!-- Meilleurs offres -->
        
        <div class="typetitre">
            <h1>Articles VIP</h1>
        </div>
        
        <!-- liste d'items -->
        
        </br>
        
        <!-- liste d'items -->
        
        <div class="items">
            <div class="row">
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
                
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
     
                <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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

                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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

                <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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
           
                 <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
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

        </br></br>

        </div>
        
<footer>
    <div class="container ">
        <div class="row ">
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <h6 class="text-uppercase font-weight-bold ">Information additionnelle</h6>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis. </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <h6 class="text-uppercase font-weight-bold ">Contact</h6>
                <p> 37, quai de Grenelle, 75015 Paris, France <br> info@webDynamique.ece.fr <br> +33 01 02 03 04 05 <br> +33 01 03 02 05 04 </p>
            </div>
        </div>
        <div class="footer-copyright text-center ">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
        </div>
</footer>
        
    </body>
</html>