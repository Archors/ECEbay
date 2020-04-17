<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="acheteur.css" rel="stylesheet" type="text/css" />

    
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

            <br>


                <div align=center>
 
                <form class="form-group">

                
                <div class="row">

                  <div class="col-md-4">
                      <img class= "img-responsive image_bancaire_CB" src="CB.jpeg">
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="#" id="#" value="option1">

                      </div>
                </div>

              


                  <div class="col-md-4">
                      <img class= "img-responsive image_bancaire_MCard" src="Mcard.png">
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="#" id="#" value="option2">
                      </div>
                  </div>


                  <div class="col-md-4">
                      <img class= "img-responsive image_bancaire_AX" src="AX.png">
                      <br>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="#" id="#" value="option3">
                      </div>
                  
                  </div>

                </div>
              
<br>
<br>

                <div class="row">
                  <div class="col-md-12">
                    <div align="center">
                      <input class="form" id="#" placeholder="Nom du Titulaire">
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <div align="center">
                      <input class="form" id="#" placeholder="Numéro Carte">
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">

                      <div class="col-md-2 offset-md-3">
                        <input class="form_1" type="month" id="#" min="2020-04">  
                      </div>

                      <div class="col-md-2 offset-md-1">
                        <input class="form_1" id="#" placeholder="Cryptogramme">
                      </div>

                </div>
                <br> 


                <div class="row">
                  <div class="col-md-12">
                    <div align="center">
                       <button type="submit" class="btn_sub"> <span class="btn_sub_text2"> Confirmer </span> </button>         
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