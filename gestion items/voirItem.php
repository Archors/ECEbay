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
        
    <link rel="stylesheet" href="gestionitems.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Voir un Article
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                <p>Nom</p>
                <p>Description</p>
                <p>Catégorie</p>
                <p>prix</p>
               </div>
               
                <div class="col-md-6">   
                     <div class="item">
                    <img src="montre.png">
                    <div class="description">
                        <h2>titre</h2>
                        <p>type de vente</p>
                        <a href="" class="btn btn-order" role=button>Voir</a>
                    </div>
                    </div>
                </div>
                    
           </div>
        
    </div>
        

        </br></br>

        
        
       <?php include '../template/footer.php'; ?>


        
    </body>
</html>