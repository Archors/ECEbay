<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="vendeur.css" rel="stylesheet" type="text/css" />

    
    <!-- Logo ECE Bay --> 
     <link rel = "icon" href = "logo.png" />

    <title>ECE Bay</title>
  </head>


  <body>

      <?php include '../template/header.php'; ?>

<!-- <div class="container"> </div> rajouter des marges -->
    <div class="container_fluid">
     <br>       
<div class="titrecat">
        Inscription
            <div class="container separation"></div>
        </div>
        </div>

<div class="container_fluid">
        <div class="corps">
            <br>

            <div class="row">
                <div class="col-md-12">
                <div align=center>
                
                <form class="form-group">
                <div class="mx-sm-3 mb-2">

                        <!-- Vérifier que pseudo existe pas déjà -->
                    
                         <input class="form-control form text_form" id="#" placeholder="Pseudo">
                </div>

                <div class="mx-sm-3 mb-2">

                        <!-- Vérifier que email existe pas déjà -->

                         <input type ="email" class="form-control form text_form" id="#" placeholder="Email">
                             
                            
                </div>

                <div class="mx-sm-3 mb-2">

                         <input class="form-control form text_form" type="password" id="#" placeholder="Mot de Passe">
          
                </div>

                 <button type="submit" class="btn_sub"> <span class="btn_sub_text2"> S'inscrire </span> </button>                
                
                </form>
            </div>
            </div>

            </div>
        </div>

            </div>

<?php include '../template/footer.php'; ?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>