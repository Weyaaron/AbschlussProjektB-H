<?php

$db = new SQLite3('./orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$stmt1 = $db->prepare('create table menuItem(id int auto_increment primary key, name varchar(100), description varchar(255), price double)'); // TODO: SQL query
$result = $stmt1->execute();

$stmt2 = $db->prepare('create table orders(id int auto_increment primary key, created timestamp current_timestamp)');
$result = $stmt2->execute();

$stmt3 = $db->prepare('create table orderItems(id int auto_increment primary key, order_id int, menu_item_id int, quantity int, foreign key (order_id) references orders(id), foreign key (menu_item_id) references menuItem(id))');
$result = $stmt3->execute();


// OrderItems
// id
// order_id
// menu_item_id
// quantity