<?php

include "../connect.php";

$usersid = filterRequest("usersid");

$data = getAllData("address", "address_usersid = $usersid");


?>