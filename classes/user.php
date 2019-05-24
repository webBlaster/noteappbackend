<?php
require("../classes/database.php");

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new database();
    }
    //registers a new user
    public function register($name,$email,$password){
        //connects to the db
        $checkersql = "SELECT * FROM users WHERE email = '$email' and username = '$name'";
        $connect = $this->db->connect();
        $check = $connect->query($checkersql);
        if($check->rowcount()==0){
            $adduser = "INSERT INTO users (username,email,password) VALUES ('$name','$email','$password')";
            $add = $connect->exec($adduser);
            if($add == 1){
                echo json_encode("new user succesfully created");
            }
            else{
                echo json_encode("creating a new user failed");
            }
        }
        else{
            echo json_encode("user already exist");
        }
    }
    //logs in a user
    public function login($username,$password){
        $connect = $this->db->connect();
        $checksql = "SELECT * FROM users WHERE username = '$username' and password ='$password'";
        $check = $connect->query($checksql);
        if($check->rowcount()==1){
            session_start();
            $_SESSION["user"]=$username;
            $_SESSION["auth"]=true;
            echo json_encode("user session started");
        }else{
            echo json_encode("wrong user details");
        }
    }
    //get user id
    private function userid($username){
        $connect = $this->db->connect();
        $sql = "SELECT id FROM users where username ='$username'";
        $result = $connect->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $id = $result[0]["id"];
        return $id;
    }
    //logs out a user
    public function logout($username){
        //unset user sessions
        session_start();
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
        echo json_encode("user session terminated");
    }
    //add note
    public function addnote($username,$content){
        $id = $this->userid($username);
    }
    //get note
    public function getnote($noteid){

    }
    //get all notes
    public function getallnotes(){

    }
}