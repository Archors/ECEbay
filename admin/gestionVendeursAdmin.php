<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['admin']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: connexionAcheteur.php");
}


class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "ecebay";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }
}
?>


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
                            <th>Supprimer</th>
                        </tr>
                       
                        
                    </thead>
                    <tbody>
                     <?php
                        $db = Database::connect();
                        $statement = $db->query('SELECT vendeur.id, vendeur.pseudo, vendeur.mail FROM vendeur ORDER BY vendeur.id ');
                        while($vendeur = $statement->fetch()) 
                        {
                            echo '<tr style="text-align:center">';
                            echo '<td>'. $vendeur['pseudo'] . '</td>';
                            echo '<td>'. $vendeur['mail'] . '</td>';
    
                            echo '<td>';
                            echo '<a type="button" class="btn btn-info" href="voirVendeur.php?id='.$vendeur['id'].'">Aperçu</a>';
                            echo ' ';
                            echo '<a type="button" class="btn btn-danger" href="supprimerVendeur.php?id='.$vendeur['id'].'">Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                    </tbody>
                </table>
            
            <a type="button" class="btn btn-primary ajouter" href="ajouterVendeur.php">Ajouter</a>
            
            </div>    
            
        </div>
        

        </br></br>

        </div>
        
        <?php include '../template/footer.php'; ?>


        
    </body>
</html>