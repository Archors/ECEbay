<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['admin']))
{
    $id=$_SESSION['id'];
   
}
else{
    header("Location: ../acheteur/connexionAcheteur.php");
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

$pseudoError = $mailError = $passwordError = $pseudo = $mail = $password =$imageprofilError = $imageprofil = $imagefondError = $imagefond = "";
    
    
    if(!empty($_POST)) 
    {
        $pseudo               = checkInput($_POST['pseudo']);
        $mail        = checkInput($_POST['mail']);
        $password              = checkInput(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $imagea              = "";
        $imageb              = "";
        $imageprofil              = checkInput($_FILES["imageprofil"]["name"]);
        $imagefond             = checkInput($_FILES["imagefond"]["name"]);
        $imagePath1          = '../images/'. basename($imageprofil);
        $imagePath2          = '../images/'. basename($imagefond);
        $imageExtension1     = pathinfo($imagePath1,PATHINFO_EXTENSION);
        $imageExtension2     = pathinfo($imagePath2,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;

        
        if(empty($pseudo)) 
        {
            $pseudoError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($mail)) 
        {
            $mailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailError = "Invalid email format";
            $isSuccess = false;
        }

        if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        
        if(empty($imageprofil)) 
        {
            $imageprofilError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension1 != "jpg" && $imageExtension1 != "png" && $imageExtension1 != "jpeg" && $imageExtension1 != "gif" ) 
            {
                $imageprofilError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
         
            if($_FILES["imageprofil"]["size"] > 500000) 
            {
                $imageprofilError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["imageprofil"]["tmp_name"], $imagePath1)) 
                {
                    $imageprofilError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if(empty($imagefond)) 
        {
            $imagefondError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension2 != "jpg" && $imageExtension2 != "png" && $imageExtension2 != "jpeg" && $imageExtension2 != "gif" ) 
            {
                $imagefondError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
           
            if($_FILES["imagefond"]["size"] > 500000) 
            {
                $imagefondError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["imagefond"]["tmp_name"], $imagePath2)) 
                {
                    $imagefondError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO vendeur (pseudo, mail, motdepasse, photoprofil, photofond) values(?, ?, ?, ?, ?)");
            $statement->execute(array($pseudo, $mail,$password,$imageprofil,$imagefond));
            Database::disconnect();
            header("Location: gestionVendeursAdmin.php");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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
        Ajouter un Vendeur
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
            <form class="form" action="ajouterVendeur.php" role="form" method="post" enctype="multipart/form-data" >
           <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo;?>">
                        <span class="help-inline"><?php echo $pseudoError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">mail:</label>
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail" value="<?php echo $mail;?>">
                        <span class="help-inline"><?php echo $mailError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                        <span class="help-inline"><?php echo $passwordError;?></span>
                    </div>
                   </div>
                <div class="col-md-6">  
                    </br>
                     <div class="form-group">
                        <label for="imageprofil">Sélectionner une image profil:</label>
                         </br>
                        <input type="file" id="imageprofil" name="imageprofil"> 
                        <span class="help-inline"><?php echo $imageprofilError;?></span>
                        </br>
                    </div>
                    
                    <div class="form-group">
                        </br>
                        <label for="imagefond">Sélectionner une image fond:</label>
                        </br>
                        <input type="file" id="imagefond" name="imagefond"> 
                        <span class="help-inline"><?php echo $imagefondError;?></span>
                    </div>
                   
                    <br>
                </div>
               
                <div class="form-actions">
                        <button type="submit" class="btn btn-success"></span> Ajouter</button> 
                   </div>
               </div>
                   
            </form>                             
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>