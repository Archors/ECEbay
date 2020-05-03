<?php

//co base de données
 session_start();    

if(isset($_GET["id"])){
    $id1 = $_GET["id"];
}
 
if (isset($_SESSION['id']) && isset($_SESSION['acheteur']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: connexionAcheteur.php");
}
//co base de données
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
//variables
$offre = $offreError = "";


    if(!empty($_POST)) 
    {
        $offre = checkInput($_POST['offre']);
        
        $isSuccess  = true;
        
        
        
        if(empty($offre)) 
        {

            $offreError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
   //si c'est une réussite     
        
        if($isSuccess) 
        { 
    
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO negociation (iditem, idacheteur,offre,compteur) values(?, ?, ?, ?)");
            $statement->execute(array($id1, $id, $offre, 1));
             $statement2 = $db->prepare("INSERT INTO panier (article, numpanier) values(?, ?)");
            $statement2->execute(array($id1, $id));
            Database::disconnect();
                header("Location: ../acheteur/panier.php");
     
            
        }
    }
//verifier data

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!-- html -->
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
        Offre
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           
        <form class="form" action="offre.php?id=<?php echo $id1; ?>" role="form" method="post" enctype="multipart/form-data" >
            <div class="form-group">
                        <label for="offre">Faire une offre:</label>
                        <input type="number" step="0.01" class="form-control" id="offre" name="offre" placeholder="offre" value="<?php echo $offre;?>">
                        <span class="help-inline"><?php echo $offreError;?></span>
            </div>
           <div class="form-actions">
                        <button type="submit" class="offre"><span class="glyphicon glyphicon-pencil"></span> Offre</button>
                        
           </div>
        </form>
    
        </div>
        

        </br></br>

        
        
       <?php include '../template/footer.php'; ?>


        
    </body>
</html>