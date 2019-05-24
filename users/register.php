<?php
require('../objects/user.php');
//get variables 
//sanitize variables
$name = htmlentities($_POST['username']);
$email =htmlentities($_POST['email']);
$password = md5($_POST['password']);
//register
$user->register($name,$email,$password);
