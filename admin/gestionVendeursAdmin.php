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
        
        <?php include '../template/footer.php'; ?>


        
    </body>
</html>