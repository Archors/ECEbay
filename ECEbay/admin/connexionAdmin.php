<?php

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
//variables
 $pseudo = $mail = $password = $test = "";
    
    
    if(!empty($_POST)) 
    {   
        
        $pseudo                = checkInput($_POST['pseudo']);
        $mail                  = checkInput($_POST['mail']);
        $password              = $_POST['password'];
        
        
        
            $db = Database::connect();
            $statement = $db->query('SELECT admin.id, admin.pseudo, admin.mail, admin.password FROM admin ORDER BY admin.id ');
                        while($admin = $statement->fetch()) 
                        {
                           if($admin['pseudo'] == $pseudo && $admin['mail'] == $mail)
                              {
                                if ($password == $admin['password']) {
                                    $test=$admin['id'];
                                    $_SESSION = array();
                                    session_destroy();
                                    session_start();
                                     $_SESSION['id'] = $admin['id'];
                                    $_SESSION['admin'] = 'admin';
                                header("Location: profilAdmin.php");
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
//fin base de données
            
    }

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
        Connexion
            <div class="container separation"></div>
        </div>
        <br><br>
            
        </div>    
            
       <div class="container">
           <span class="help-inline" style="color:red;margin:0 auto;"><?php echo $test;?></span>
            <form class="form" action="connexionAdmin.php" role="form" method="post" enctype="multipart/form-data">
           <div class="row">
               <div class="col-md-12">
                    <div class="form-group">
                        <label for="pseudo">Pseudo:</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo;?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="mail">mail:</label>
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail" value="<?php echo $mail;?>">
                        
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                        
                    </div>
                   </div>
                    
               
                <div class="form-actions"  style="margin:0 auto">
                        <button type="submit" class="btn btn-success"></span> Se connecter</button> 
                   </div>
               </div>
                   
            </form>                             
                
    </div>
         

        </br></br>

        
        
  <?php include '../template/footer.php'; ?>

        
    </body>
</html>