<?php

include "../connect.php";


$email = filterRequest("email");
$verifycode = rand(10000 , 99999);

$data = array(
        "users_verifycode" => $verifycode,
    );

updateData("users",$data,"users_email = '$email'");


    //sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verifycode") ; 

