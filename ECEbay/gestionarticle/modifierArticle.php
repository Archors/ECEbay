<?php
     
 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
{
    $id=$_SESSION['id'];
   
}
elseif(isset($_SESSION['id']) && isset($_SESSION['admin'])){
    $id=$_SESSION['id'];
}
else{
    header("Location: connexionVendeur.php");
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

 if(!empty($_GET['id'])) 
    {
        $id2 = checkInput($_GET['id']);
    }
 //variables
    $nomError = $descriptionError = $prixError = $categorieError = $imageError = $typeError = $dateError = $nom = $description = $prix = $categorie = $image = $type = $date = "";

//si formulaire envoyé
    if(!empty($_POST)) 
    {
        $nom               = checkInput($_POST['nom']);
        $description        = checkInput($_POST['description']);
        $prix              = checkInput($_POST['prix']);
        $categorie           = checkInput($_POST['categorie']); 
        $type           = checkInput($_POST['type']); 
        $date           = checkInput($_POST['date']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = true;
        
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($prix)) 
        {
            $prixError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($categorie)) 
        {
            $categorieError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($type)) 
        {
            $typeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($date) && $type == 2) 
        {
            $dateError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

    
    //vérification des images
        if($image != "")
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        //pareil
        if($isSuccess && $isUploadSuccess) 
        {
            
            if($image == "")
            {
                
                $db = Database::connect();
                $statement = $db->prepare("UPDATE article set nom= ?,description= ?,prix= ?,categorie= ?,type= ?,date= ? WHERE id = ?");
                $statement->execute(array($nom,$description,$prix,$categorie,$type,$date,$id2));
                Database::disconnect();
                
                if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
                {
                    header("Location: ../vendeur/espace_vendeur.php");

                }
                elseif(isset($_SESSION['id']) && isset($_SESSION['admin'])){
                    header("Location: ../admin/profilAdmin.php");
                }
                
         //encore pareil   
        }
        else
        {
                $db = Database::connect();
                $statement = $db->prepare("UPDATE article set nom= ?,description= ?,prix= ?,categorie= ?,type= ?,date= ?,image= ? WHERE id = ?");
                $statement->execute(array($nom,$description,$prix,$categorie,$type,$date,$image,$id2));
                Database::disconnect();

                if (isset($_SESSION['id']) && isset($_SESSION['vendeur']))
                {
                    header("Location: ../vendeur/espace_vendeur.php");

                }
                elseif(isset($_SESSION['id']) && isset($_SESSION['admin'])){
                    header("Location: ../admin/profilAdmin.php");
                }
                
        }
    }
    }
   //garder anciennes valeurs     
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM article where id = ?");
        $statement->execute(array($id2));
        $article = $statement->fetch();
        $nom          = $article['nom'];
        $description    = $article['description'];
        $categorie         = $article['categorie'];
        $type       = $article['type'];
        $prix          = $article['prix'];
        $image          = $article['image'];
        $date          = $article['date'];
        Database::disconnect();
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

    <link rel="stylesheet" href="gestionarticle.css">
        
    </head>
    
    <body>
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Modifier un Article
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <form class="form" action="modifierArticle.php?id=<?php echo $id2; ?>" role="form" method="post" enctype="multipart/form-data">
           <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                        <span class="help-inline"><?php echo $descriptionError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix: </label>
                        <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?php echo $prix;?>">
                        <span class="help-inline"><?php echo $prixError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="categorie">Catégorie:</label>
                        <select class="form-control" id="categorie" name="categorie">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM categorie') as $row) 
                           {
                                echo '<option value="'. $row['id'] .'">'. $row['nom'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $categorieError;?></span>
                    </div>
                   </div>
                <div class="col-md-6">  
                    </br>
                
                    <div class="form-group">
                        <label for="type">Type de vente:</label>
                        <select class="form-control" id="type" name="type">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM type') as $row) 
                           {
                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $typeError;?></span>
                    </div>
                    <div class="form-group">
                        <input type="datetime" id="date" name="date" placeholder="AAAA-MM-JJ HH:MM:SS"> 
                  
                        <span class="help-inline"><?php echo $dateError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>
               </div>
                <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                       
                   </div>
            </div>
                   
        </form>
            
    </div>   

        </br></br>
  
        
  <?php include '../template/footer.php'; ?>


        
    </body>
</html>