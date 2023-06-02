<?php

include "../../connect.php";


$email = filterRequest("email");
$verifycode = rand(10000 , 99999);

$data = array(
        "delivery_verifycode" => $verifycode,
    );

updateData("delivery",$data,"delivery_email = '$email'");


    //sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verifycode") ; 

