<?php
require('../objects/user.php');
//get variables 
//sanitize variables
$name = htmlentities(isset($_POST['username']));
$email =htmlentities(isset($_POST['email']));
$password = md5(isset($_POST['password']));
//register
$user->register($name,$email,$password);