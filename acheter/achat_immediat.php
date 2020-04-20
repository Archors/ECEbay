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
        
        
        
        <div class="container">
        
        <div class="titrecat">
            <!-- titre de la categorie -->
        Achat Immédiat
        <!-- Diminuer taille -->
        <div class="container separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
        
        <!-- partie recherche -->
        
    <div class="row justify-content-center">
                            <form>
                                <div class="row align-items-center form_2">
                                    <div class="col-1">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="col-10">
                                    <input type="search"id="#" placeholder="Rechercher un item">
                                    </div>
                                </div>
                            </form>
                        <!--end of col-->
    </div>
    <br> <br>  
        
        
        <!-- Liste items Vente Immédiate -->
        

            <div class="row">

                 <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>
                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> 
                
                 <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>

                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> 
     
                <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>
                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> 
            
            </div>
</br><br><br>

            <div class="row">

                 <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>
                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br><br><br><br>
                </div> 
                
                 <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>

                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     
                </div> 

     
                <div class="col-sm-6 col-md-4">
                    <div class="item">
                    <img src="montre_deGaulle.jpeg" class="img1">
                    <div class="description">
                        <span class="titre_objet">Montre Général de Gaulle</span>
                        <br>
                        <span class="description_objet">Ferailles et Trésor</span>
                        <br>
                        <span class="description_objet">prix:229$ </span>
                        <br>
                        <br>
                        <a href="objet.php" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     
                </div> 
            
            </div>
</br>

</div>
</div>

        
<?php include '../template/footer.php'; ?>
    </body>
</html>