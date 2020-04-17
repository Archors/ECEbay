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
        

    <link rel="stylesheet" href="admin.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Ajouter un Vendeur
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <div class="row">
               <div class="col-md-6">
               <form class="form" role="form" action="" methode="post">
                <label>Pseudo: </label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo" value="">
                   <br>
                <label>Nom: </label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="">
                   <br>
                <label>Prénom: </label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" value="">
                   <br>
                   </div>
                <div class="col-md-6">   
                <label>Mail: </label>
                <input type="text" class="form-control" id="mail" name="mail" placeholder="mail" value="">
                   <br>
                <label>Mot de passe: </label>
                <input type="text" class="form-control" id="pwd" name="pwd" placeholder="pwd" value="">
                   <br>
                </div>
                   <div class="btn_ajouter"><button type="button" class="btn btn-primary">Ajouter</button></div>
                    
               </form>
               
            
           </div>
        
    </div>
        

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>