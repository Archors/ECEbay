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
        
    <link rel="stylesheet" href="styleshtf.css">
    <link rel="stylesheet" href="stylesback.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
   <nav class="navbar navbar-expand-md">
     <a class="navbar-brand" href="#">Logo</a>
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
        <div class="container">
        
        <div class="titrecat">
        Les vendeurs
            <div class="container separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-stripped">
                    <thead style="text-align:center">
                        <tr>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Supprimer</th>
                        </tr>
                       
                        
                    </thead>
                    <tbody>
                     <tr style="text-align:center">
                            <td>caca</td>
                            <td>aurelien.davodet@edu.ece.fr</th>
                            <td>zizi</td>
                            <td>prout</td>

                            <td>
                                <center><button type="button" class="btn btn-danger">Supprimer</button></center>
                            </td>
                        </tr>
                        <tr style="text-align:center">
                            <td>rouge</td>
                            <td>bleu</td>
                            <td>vert</td>
                            <td>noir</td>

                            <td>
                                <center><button type="button" class="btn btn-danger">Supprimer</button></center>
                            </td>
                        </tr>
                        <tr style="text-align:center">
                            <td>chien</td>
                            <td>chat</td>
                            <td>tigre</td>
                            <td>lapin</td>

                            <td>

                                <center><button type="button" class="btn btn-danger">Supprimer</button></center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
            <button type="button" class="btn btn-primary">Ajouter</button>
            
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
</footer>


        
    </body>
</html>