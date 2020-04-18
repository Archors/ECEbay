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
        
    <link rel="stylesheet" type="text/css" href="../acheteur/acheteur.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Panier
        <!-- Diminuer taille -->
            <div class="container separation"></div>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-6">
                    <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            
                        </tr>
                       
                        
                    </thead>
                    <tbody>
                     <tr>
                            <td>Image</td>
                            <td>Montre du Général de Gaulle</td>
                            <td>200€</td>
    
                        </tr>
                        <tr>
                             <td>Image</td>
                            <td>Montre du Général de Gaulle</td>
                            <td>200€</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>Montre du Génral de Gaulle</td>
                            <td>200€</td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
                
                <!-- Comment tracer la ligne a gauche de passer commande ? -->
                <div class="col-md-3" style="margin:0 auto">
                    
                    <div align="center">
                    <div class="totalpanier">
                        <span class="total_texte">Total : </span>
                            <span class="montant"> 600€ </span>
                        <br>
                    
                        
                        <a href="form_connexion.php" class="passercommande">Passer Commande</a>
                    </div>
                   
                        
                    </div>
                
                    </div>

                
        
            
            </div>    
            
        </div>
        

        </br></br>

        </div>
        
        


       <?php include '../template/footer.php'; ?>


        
    </body>
</html>