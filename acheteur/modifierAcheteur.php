<?php

 session_start();                 
 
if (isset($_SESSION['id']) && isset($_SESSION['acheteur']))
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


 if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }


$pseudoError = $mailError = $passwordError = $pseudo = $mail = $password =$nomError = $nom = $prenomError = $prenom = "";
$typecarte = $nomcarte = $codecarte = $datecarte = $cryptogramme = $pays = $ville = $codepostal = $adresse1 = $adresse2 = $tel = "";
$typecarteError = $nomcarteError = $codecarteError = $datecarteError = $cryptogrammeError = $paysError = $villeError = $codepostalError = $adresse1Error = $adresse2Error = $telError = "";    
    
    
    if(!empty($_POST)) 
    {
        $pseudo               = checkInput($_POST['pseudo']);
        $mail        = checkInput($_POST['mail']);
        $nom             = checkInput($_POST['nom']);
        $prenom             = checkInput($_POST['prenom']);
        $typecarte              = checkInput($_POST['typecarte']);
        $nomcarte              = checkInput($_POST['nomcarte']);
        $codecarte              = checkInput($_POST['codecarte']);
        $datecarte              = checkInput($_POST['datecarte']);
        $cryptogramme              = checkInput($_POST['cryptogramme']);
        $pays              = checkInput($_POST['pays']);
        $ville              = checkInput($_POST['ville']);
        $codepostal              = checkInput($_POST['codepostal']);
        
        $adresse1              = checkInput($_POST['adresse1']);
        $adresse2              = checkInput($_POST['adresse2']);
        $tel              = checkInput($_POST['tel']);
        $isSuccess          = true;


        
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
        
        if(empty($typecarte)) 
        {
            $typecarteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($nomcarte)) 
        {
            $nomcarteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($codecarte)) 
        {
            $codecarteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($datecarte)) 
        {
            $datecarteError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($cryptogramme)) 
        {
            $cryptogrammeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($pays)) 
        {
            $paysError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($ville)) 
        {
            $villeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($codepostal)) 
        {
            $codepostalError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($adresse1)) 
        {
            $adresse1Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($tel)) 
        {
            $telError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
          
        
        if($isSuccess) 
        {
            
                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE acheteur set pseudo = ?, mail = ?, nom = ?, prenom = ?, telephone = ?, pays = ?, ville = ?, codepostal = ?, adresse1 = ?, adresse2 = ?, typecarte = ?, nomcarte = ?, codecarte = ?, cryptogramme = ?, datecarte = ? WHERE id = ?");
                    $statement->execute(array($pseudo,$mail,$nom,$prenom,$tel,$pays,$ville,$codepostal,$adresse1,$adresse2,$typecarte,$nomcarte,$codecarte,$cryptogramme,$datecarte,$id));
                    Database::disconnect();
                    header("Location: profilAcheteur.php");
    
        }
    }


    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM acheteur where id = ?");
        $statement->execute(array($id));
        $acheteur = $statement->fetch();
        $pseudo          = $acheteur['pseudo'];
        $mail    = $acheteur['mail'];
        
        $nom       = $acheteur['nom'];
        $prenom          = $acheteur['prenom'];
        $tel          = $acheteur['telephone'];
        $pays          = $acheteur['pays'];
        $ville          = $acheteur['ville'];
        $codepostal          = $acheteur['codepostal'];
        $adresse1          = $acheteur['adresse1'];
        $adresse2          = $acheteur['adresse2'];
        $typecarte          = $acheteur['typecarte'];
        $nomcarte          = $acheteur['nomcarte'];
        $datecarte          = $acheteur['datecarte'];
        $codecarte          = $acheteur['codecarte'];
        $cryptogramme          = $acheteur['cryptogramme'];
        
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
        

    <link rel="stylesheet" href="admin.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Modifier Profil

            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
            <form class="form" action="modifierAcheteur.php" role="form" method="post" enctype="multipart/form-data" >
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
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="typecarte">Type carte:</label></br>
                        <input type="radio" name="typecarte" checked value="cb">CB
                        <input type="radio" name="typecarte" checked value="visa">Visa
                        <input type="radio" name="typecarte" checked value="mastercard">MasterCard
                        <span class="help-inline"><?php echo $typecarteError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="typecarte">Nom de la carte:</label>
                        <input type="text" class="form-control" id="nomcarte" name="nomcarte" placeholder="Nom" value="<?php echo $nomcarte;?>">
                        <span class="help-inline"><?php echo $nomcarteError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="codecarte" name="codecarte" placeholder="code" value="<?php echo $codecarte;?>">
                        <span class="help-inline"><?php echo $codecarteError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="datecarte">Date:</label>
                        <input type="date" class="form-control" id="datecarte" name="datecarte" value="<?php echo $datecarte;?>">
                        <span class="help-inline"><?php echo $datecarteError;?></span>
                    </div>
                    
                    
                   </div>
               <br>
                <div class="col-md-6">  
                    
                     <div class="form-group">
                        <label for="cryptogramme">Cryptogramme:</label>
                        <input type="text" class="form-control" id="cryptogramme" name="cryptogramme" placeholder="Crypto" value="<?php echo $cryptogramme;?>">
                        <span class="help-inline"><?php echo $cryptogrammeError;?></span>
                    </div>
                   <div class="form-group">
                        <label for="pays">Pays:</label>
                        <input type="text" class="form-control" id="pays" name="pays" placeholder="Pays" value="<?php echo $pays;?>">
                        <span class="help-inline"><?php echo $paysError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville:</label>
                        <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" value="<?php echo $ville;?>">
                        <span class="help-inline"><?php echo $villeError;?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="codepostal">Code Postal:</label>
                        <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Code postal" value="<?php echo $codepostal;?>">
                        <span class="help-inline"><?php echo $codepostalError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="adresse1">Adresse 1:</label>
                        <input type="text" class="form-control" id="adresse1" name="adresse1" placeholder="Adresse" value="<?php echo $adresse1;?>">
                        <span class="help-inline"><?php echo $adresse1Error;?></span>
                    </div>
                    <div class="form-group">
                        <label for="adresse2">Adresse 2:</label>
                        <input type="adresse2" class="form-control" id="adresse2" name="adresse2" placeholder="Adresse" value="<?php echo $adresse2;?>">
                        <span class="help-inline"><?php echo $adresse2Error;?></span>
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone:</label>
                        <input type="text" class="form-control" id="tel" name="tel" placeholder="Telephone" value="<?php echo $tel;?>">
                        <span class="help-inline"><?php echo $telError;?></span>
                    </div>
                   
                    <br>
                </div>
               
                <div class="form-actions">
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        
                   </div>
               </div>
                   
               </form>
            
        </div>   
                    
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>