<?php

include "../../connect.php";
 
$password = sha1($_POST['password']);
$email = filterRequest("email"); 
//$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = ? AND  delivery_password = ? AND delivery_approve = 1  ");
//$stmt->execute(array($email, $password));
//$count = $stmt->rowCount();
//result($count)
getData("delivery","delivery_email = ? AND  delivery_password = ?",array($email, $password));