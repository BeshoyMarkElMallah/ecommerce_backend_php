<?php

include '../../connect.php';

$orderid = filterRequest("ordersid");

$userid = filterRequest("usersid");

$data = array(
    "orders_status"=> 1
);


updateData("orders",$data,"orders_id = $orderid AND orders_status = 0");

insertNotify("success", "Your order has been approved!", $userid,"users$userid","none","refreshorderpending");
//sendGCM("success","Your order has been approved!","users$userid","none","refreshorderpending");
?>