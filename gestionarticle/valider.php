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

        $tt = $nego['iditem'];

        $statement4 = $db->prepare("SELECT article.nom FROM article WHERE article.id = ? ");
        $statement4->execute(array($nego['iditem']));       
        $article = $statement4->fetch();

        $statement3 = $db->prepare("SELECT * FROM acheteur WHERE id = ? ");
        $statement3->execute(array($nego['idacheteur']));       
        $acheteur = $statement3->fetch();
        $solde = $acheteur['solde'] - $nego['offre'];

        $statement = $db->prepare("UPDATE acheteur set solde= ?,negocie= ? WHERE id = ?");
                $statement->execute(array($solde,$article['nom'], $nego['idacheteur'] ));

        $statement5 = $db->prepare("DELETE FROM article WHERE id = ? ");
            $statement5->execute(array($tt));
        $statement6 = $db->prepare("DELETE FROM panier WHERE article = ? ");
            $statement6->execute(array($tt));
        $statement7 = $db->prepare("DELETE FROM negociation WHERE iditem = ? ");
            $statement7->execute(array($tt));

        
       
        header("Location: ../vendeur/espace_vendeur.php");
    

function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>