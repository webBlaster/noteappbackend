<?php
require("../includes/config.php");
class database
{
    private $servername = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;
    private $conn;

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            return $this->conn;
        }
        catch(PDOException $e){
            echo "there was an issue".$e->getMessage();
        }
    }
    public function connect(){
        return $this->conn;
    }
}
/*
$db = new database();
$dbname = DB_NAME;
$sql = "SELECT * FROM users where username = 'jb' and email = 'jb@gmail.com'";
$connect = $db->connect();
$result = $connect->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
*/
?>
