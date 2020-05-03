

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
    <!-- Reponsive header --> 
    <!-- navbar-expand-md combiné à div class="collapse navbar-collapse" permet de rassembler les différents menus dans une nouvelle barre si l'écran est plus petit qu'un écran de taille md --> 
<nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="../accueil/accueil.php"> <img src="../images/Logo.png" alt="Home " height="40" width="auto" /></a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
     <span class="navbar-toggler-icon "></span>
     </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Catégories
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../acheter/categorie.php?id=1">Férailles et Trésors</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../acheter/categorie.php?id=2">Bons musées</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../acheter/categorie.php?id=3">Accessoires VIP</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acheter
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../acheter/achat.php?id=1">Achats immédiats</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../acheter/achat.php?id=2">Enchères</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../acheter/achat.php?id=3">Meilleures offres</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vendre
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 

                                if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
                                {
                                    echo '<a class="dropdown-item" href="../vendeur/espace_vendeur.php">Mon espace</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../acheteur/deconnexionAcheteur.php">Se déconnecter</a>';
                                }
                                else{
                                    echo '<a class="dropdown-item" href="../vendeur/connexionVendeur.php">Se connecter</a>';
                                }
                        ?>
                        
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <?php 

                                if (isset($_SESSION['id']) && isset($_SESSION['admin']))
                                {
                                    echo '<a class="dropdown-item" href="../admin/profilAdmin.php">Mon espace</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../admin/gestionVendeursAdmin.php">Gestion vendeur</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../acheteur/deconnexionAcheteur.php">Se déconnecter</a>';
                                }
                                else{
                                    echo '<a class="dropdown-item" href="../admin/connexionAdmin.php">Se connecter</a>';
                                }
                        ?>
                        
                        
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Compte
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                            
                   
 
                                if (isset($_SESSION['id']) && isset($_SESSION['acheteur']))
                                {
                                    echo '
                                    <a class="dropdown-item" href="../acheteur/profilAcheteur.php">Mon profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../acheteur/deconnexionAcheteur.php">Se déconnecter</a>';
                                }
                                else{
                                    echo '<a class="dropdown-item" href="../acheteur/connexionAcheteur.php">Se connecter</a>
                                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item petit_texte">Vous êtes nouveau ?</a>
                        <a class="dropdown-item" href="../acheteur/inscriptionAcheteur.php"> Inscription  </a>';
                                }

                        
                        ?>
                        
                        
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../acheteur/panier.php"><i class="fas fa-shopping-bag"></i> Panier</a></li>
            </ul>
        </div>
    </nav>
    
</body>
    
</body>
</html>


