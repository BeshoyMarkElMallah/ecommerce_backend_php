<?php
include "../connect.php";


$addressid = filterRequest("addressid");



deleteData("address","id = $addressid");

?>