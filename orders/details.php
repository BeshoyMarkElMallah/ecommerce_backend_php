<?php
include "../connect.php";

$ordersid = filterRequest("ordersid");

getAllData("ordersdetailsview","cart_orders = $ordersid")

?>