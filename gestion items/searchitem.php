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
/*

<form action = "index.php" method= "post">
    <input type = "text" name="search" placeholder="Recherche d'items..."/>
    <input type = "submit" value = "Recherche" />
</form>
*/

    //source https://www.youtube.com/watch?v=PBLuP2JZcEg
    //Collecte des informations
    $keyword='ap';
$sql="SELECT * FROM `items` WHERE `name` LIKE :keyword;";
$q=$dbh->prepare($sql);
$q->bindValue(':keyword','%'.$keyword.'%');
$q->execute();
while ($r=$q->fetch(PDO::FETCH_ASSOC)) {
    echo"<pre>".print_r($r,true)."</pre>";
}

?>