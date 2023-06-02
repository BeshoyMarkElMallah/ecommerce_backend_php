<?php
include "./connect.php";

//$userid = filterRequest("usersid");

//$items = getAllData("itemsview","categories_id = '$categoryid'");

$stmt = $con->prepare("SELECT items1view.*,1 as favorite,(items_price -(items_price*items_discount/100)) as itemspricediscount FROM items1view 
INNER JOIN favorite on favorite.favorite_itemsid = items1view.items_id 
WHERE items_discount != 0
UNION ALL 
SELECT *,0 as favorite,(items_price -(items_price*items_discount/100)) as itemspricediscount FROM items1view
WHERE items_discount != 0 AND items_id NOT IN ( SELECT items1view.items_id FROM items1view 
INNER JOIN favorite on favorite.favorite_itemsid = items1view.items_id )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
