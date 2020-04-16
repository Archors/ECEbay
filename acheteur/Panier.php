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
        
    <link rel="stylesheet" type="text/css" href="acheteur.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Votre Panier
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
                            <th>Valeur</th>
                            
                        </tr>
                       
                        
                    </thead>
                    <tbody>
                     <tr>
                            <td>caca</td>
                            <td>zizi</td>
                            <td>prout</td>
    
                        </tr>
                        <tr>
                             <td>caca</td>
                            <td>zizi</td>
                            <td>prout</td>
                        </tr>
                        <tr>
                            <td>caca</td>
                            <td>zizi</td>
                            <td>prout</td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
                
                <div class="col-md-2" style="margin:0 auto">
                    <div class="totalpanier">
                        <h4>total : </h4>
                        </br>
                        <button class="passercommande">Passer commande</button>
                        
                    </div>
                
                </div>
                
        
            
            </div>    
            
        </div>
        

        </br></br>

        </div>
        


       <?php include '../template/footer.php'; ?>


        
    </body>
</html>