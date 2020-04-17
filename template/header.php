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
        $(window).on("load resize", function() {
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Intégration d'un librairie d'icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">

    </script>
    <link rel="stylesheet" type="text/css" href="../template/styleshtf.css">

</head>
    
<body>
<nav class="navbar navbar-expand">
        <a class=" navbar-brand " href="# "><img src="../images/Logo.png" alt="Home " height="50" width="auto" /></a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Catégories
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../acheter/categorie.php">Férailles et Trésor</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Bon musées</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Accessoires VIP</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acheter
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Achat immédiat</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Enchère</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Meilleur offre</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../vendeur/form_vendeur.php">Vendre</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../admin/form_admin.php">Se connecter</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Compte
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Se connecter</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">Vous êtes nouveau ?</a>
                        <a class="dropdown-item" href="#"> S'inscrire  </a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../acheteur/panier.php"><i class="fas fa-shopping-cart"></i> Panier</a></li>
            </ul>
        </div>
    </nav>
    
</body>
</html>


