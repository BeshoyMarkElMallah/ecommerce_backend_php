CREATE OR REPLACE VIEW itemsview as
SELECT items.* , categories.* FROM items
INNER JOIN categories ON categories.categories_id = items.items_cat



SELECT items1view.*,1 as favorite FROM items1view 
INNER JOIN favorite on favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = 1
UNION ALL 
SELECT *,0 as favorite FROM items1view
WHERE items_id != ( SELECT items1view.items_id FROM items1view 
INNER JOIN favorite on favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = 1 )



CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.*,items.* , users.users_id FROM favorite
INNER JOIN users on users.users_id = favorite.favorite_usersid
INNER JOIN items on items.items_id = favorite.favorite_itemsid


CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.items_price - items.items_price * items_discount /100 ) as itemsprice , COUNT(cart.cart_itemsid) as countitems, cart.* , items.* FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders = 0
GROUP BY cart.cart_itemsid , cart.cart_usersid,cart.cart_orders;




CREATE OR REPLACE VIEW ordersview AS
SELECT orders.* , address.* FROM orders
LEFT JOIN address ON address.id = orders.orders_address


CREATE OR REPLACE VIEW ordersdetailsview AS
SELECT SUM(items.items_price - items.items_price * items_discount /100 ) as itemsprice , COUNT(cart.cart_itemsid) as countitems, cart.* , items.* FROM cart 
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders != 0
GROUP BY cart.cart_itemsid , cart.cart_usersid,cart.cart_orders;



CREATE OR REPLACE VIEW itemstopselling AS
SELECT COUNT(cart_id) AS countitems , cart.*, items.*,(items_price -(items_price*items_discount/100)) as itemspricediscount FROM cart
INNER JOIN items ON items.items_id = cart.cart_itemsid
WHERE cart_orders != 0
GROUP BY cart_itemsid
