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


<!-- <div class="container"> </div> rajouter des marges -->
        <div class="container">
        
        <div class="titrecat">
            <!-- titre de la categorie -->
        Bon pour le Musée
        <!-- Diminuer taille -->
        <div class="container separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
            
            
                <div class="row">
            

                <div class="col-sm-4 col-md-5">
                    <br> <br><br><br><br>
                    <div align=center>
                    <img class= "img-responsive img1 text-center" src="montre_deGaulle.jpeg">
                    </div>
                
                </div>


                <div class="col-md-7">
                <p class="titre_item"> Montre du Général de Gaulle </p>
                <br>
                <br>
                <br>
                <p class="texte_item"> <b> description :</b> dolor sit amet, consectetur adipiscing elit. Maecenas eget nibh et ex fermentum vulputate. Proin ullamcorper nisi nunc, ut venenatis nisl sodales dictum. Duis nec est ultrices, maximus lorem et, dictum arcu. Pellentesque malesuada dui malesuada augue rhoncus posuere. Maecenas vel ipsum libero. </p>
                <br>
                <p class="texte_item"> <b> Vendeur : </b> Nunc in gravida velit. </p>
                <br>
                <p class="texte_item"> <b> Enchère actuelle : </b> 1240$ </p>

                <br> <br>
               </div>
             </div>

              <div class="row">

                <div class="col-md-2 offset-md-5">

                         <input class="form-control" id="#" placeholder="Montant">
                </div>
                
                <div class="col-md-5">
                 <button type="submit" class="btn_bg_2 btn_text_2"> <a href="../acheteur/Panier.php "class="btn_text_2"> Enchere </a> </button>

               </div>
            
              </div>

              <div class="row">
                <div class="col-md-7 offset-md-5">
                  <br>
                    <span class="alerte"> Il s'agit du montant maximale que vous souhaitez payer, nous enchérissons pour vous. </span>
                  </div>
                </div>
              </div>


            </div>
          </div>

        <br> <br> <br>






        
<?php include '../template/footer.php'; ?>
    </body>
</html>