<?php

$db = new SQLite3('./../orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

function get_post_data() {
    return json_decode(file_get_contents('php://input'));
    }

$data = get_post_data();

$stmt = $db->prepare('INSERT INTO orders(created) VALUES (CURRENT_TIMESTAMP)');
$result = $stmt->execute();

$order_id = $db->lastInsertRowID();
$menu_item_id = $data->id;
$quantity = 4;


$stmt2 = $db->prepare('INSERT INTO orderItems ("order_id", "menu_item_id", "quantity") VALUES (:order_id, :menu_item_id, :quantity)');
$stmt2->bindValue(':order_id', $order_id);
$stmt2->bindValue(':menu_item_id', $menu_item_id);
$stmt2->bindValue(':quantity', $quantity);

$result = $stmt2->execute();

// ein prepared statement mehrmals ausführen in einer Schleife, um die einzelnen Menu_Items einzufügen
