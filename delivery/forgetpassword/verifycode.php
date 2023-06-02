<?php 

include "../../connect.php";

$email = filterRequest("email"); 

$verfiy = filterRequest("verifycode") ; 

$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = '$email' AND delivery_verifycode = '$verfiy' ") ; 
 
$stmt->execute() ; 

$count = $stmt->rowCount() ; 

result($count);
?>