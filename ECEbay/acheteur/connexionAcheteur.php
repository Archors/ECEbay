<?php

//connexion à la base de données 
//connexion à une session
session_start();


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

//info sur les variables

 $pseudo = $mail = $password = $test = "";
    
    
    if(!empty($_POST)) 
    {   
        
        $pseudo                = checkInput($_POST['pseudo']);
        $mail                  = checkInput($_POST['mail']);
        $password              = $_POST['password'];
        
        
        //connexion base de données
            $db = Database::connect();
            $statement = $db->query('SELECT acheteur.id, acheteur.pseudo, acheteur.mail, acheteur.password FROM acheteur ORDER BY acheteur.id ');
                        while($acheteur = $statement->fetch()) 
                        {
                            //inscription
                           if($acheteur['pseudo'] == $pseudo && $acheteur['mail'] == $mail)
                              {
                                if (password_verify($password, $acheteur['password'])) {
                                    $test=$acheteur['id'];
                                    $_SESSION = array();
                                    session_destroy();
                                    session_start();
                                    $_SESSION['id'] = $acheteur['id'];
                                    $_SESSION['acheteur'] = 'acheteur';
                                header("Location: profilAcheteur.php");
                                } else {
                                     $test="erreur de connexion";
                                }
                                  
                              }
                              else
                              {
                                  $test="erreur de connexion";
                                
                              }
                        }
            Database::disconnect();

            
    }
    //fonction vérification
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!-- html-->
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
        

    <link rel="stylesheet" href="acheteur.css">
        
    </head>
    
    
    <!-- Debut body -->
    
    <body>
        
    <!-- Header navbar-->
        
        <?php include '../template/header.php'; ?>
        
        <!-- titre de la categorie -->
        <div class="container">
        
        <div class="titrecat">
        Connexion
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <span class="help-inline" style="margin:0 auto;"><?php echo $test;?></span>
            <form action="connexionAcheteur.php" role="form" method="post" enctype="multipart/form-data">
                <!-- On affiche sur une ligne, 6 colonnes, un formulaire a remplir sur le pseudo, puis sur la row d'apres le mail et enfin le mot de passe -->

           <div class="row">
               <div class="col-md-6 offset-md-3">
                    <div class="form-group">
            
                            <input type="text" class="form" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo;?>">
                        
                    </div>
                </div>
            </div>
<!-- On affiche sur une ligne, 6 colonnes, un formulaire a remplir sur le pseudo, puis sur la row d'apres le mail et enfin le mot de passe -->

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">

                        <input type="text" class="form" id="mail" name="mail" placeholder="Mail" value="<?php echo $mail;?>">    
             
                    </div>
                </div>
            </div>
<!-- On affiche sur une ligne, 6 colonnes, un formulaire a remplir sur le pseudo, puis sur la row d'apres le mail et enfin le mot de passe -->

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <input type="password" class="form" id="password" name="password" placeholder="Mot de passe" value="<?php echo $password;?>">
                        
                    </div>
                </div>
            </div>
<br>
            <div class="row">
                <div class="col-md-6 offset-md-3">        
                    <div class="form-actions"  style="margin:0 auto">
                            <button type="submit" class="btn btn_sub"> <span class="btn_sub_text2"> Se connecter </span> </button> 
                    </div>
               </div>
            </div>
                   
            </form>                             
          <!-- On affiche sur une ligne, 6 colonnes, un formulaire a remplir sur le pseudo, puis sur la row d'apres le mail et enfin le mot de passe -->
      
    </div>
         

        </br></br> <br> <br> <br> <br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>
