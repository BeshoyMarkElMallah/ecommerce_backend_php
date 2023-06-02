<?php

include "../connect.php";


$usersid = filterRequest("usersid");

getAllData("ordersview","orders_usersid = '$usersid' AND orders_status = 4");

//0 waiting for payment
//1 prepare
//2 delivery in progress
//3 on the way
//4 delivered

?>