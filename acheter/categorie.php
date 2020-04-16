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
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        <?php include '../template/header.php'; ?>
   
        <!-- titre de la categorie -->
        <div class="container-fluid">
        
        <div class="titrecat">
        Férailles et Trésors
            <div class="container separation"></div>
        </div>
        
        <!-- partie recherche -->
        
        <div class="recherche">
            </br>
             <form class="form" role="form" action="" methode="post" >
                   <a href=""> <input type="text" class="form-control" id="recherche" name="recherche" placeholder="recherche" value=""></a>
               </form>
        </div>
        
        </br></br>
        
        <!-- liste d'items -->
    
        <div>
            <div class="row">
                <div class="col-md-2">
                    </br>
                    <ul>
                        <li>Achat immédiat</li>
                        <li>Enchère</li>
                        <li>Meilleur offre</li>
                    </ul>
                <div class="container separation"></div>
                </br>
            </div>
            
            <div class="col-md-10">
  
                <div class="items">
            <div class="row">
                 <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                    <img src="montre.png">
                    <div class="description">
                        <h2>Montre Cartier</h2>
                        <p>620E</p>
                        <a href="" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                     </br>
                </div> 
                
                 <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                    <img src="montre.png">
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
                    <img src="montre.png">
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
                    <img src="montre.png">
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
                    <img src="montre.png">
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
                    <img src="montre.png">
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
            </div>
            
            </div>
    
        </div>
        
        

        
        </br></br>
        
       
<?php include '../template/footer.php'; ?>
        
    </body>
</html>