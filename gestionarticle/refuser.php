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
        $identifiant = checkInput($_GET['id']);
    }
     
   

    
         $db = Database::connect();
        $statement2 = $db->prepare("SELECT * FROM negociation WHERE id = ? ");
        $statement2->execute(array($identifiant));       
        $nego = $statement2->fetch();
        $compteur;
        
        if($nego['compteur'] == 5){
            $statement3 = $db->prepare("DELETE FROM panier WHERE article = ? AND numpanier = ?");
            $statement3->execute(array($nego['iditem'],$nego['idacheteur']));
            $statement4 = $db->prepare("DELETE FROM negociation WHERE id = ? ");
            $statement4->execute(array($identifiant));
        }
        else{
            $compteur=$nego['compteur']+1;
             $statement = $db->prepare("UPDATE negociation set offre= ?,compteur= ? WHERE id = ?");
                $statement->execute(array(0, $compteur, $identifiant));
            
        }
        header("Location: ../vendeur/espace_vendeur.php");
    

function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>