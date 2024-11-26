<?php


$db = new SQLite3('./../orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);




function get_post_data() {
    return json_decode(file_get_contents('php://input'));
    }

$data = get_post_data();





$stmt = $db->prepare('INSERT INTO orders(created) VALUES (CURRENT_TIMESTAMP)');
$result = $stmt->execute();

$order_id = $db->lastInsertRowID();
// Zugriff auf einzelne Objekte des Arrays oder_data
foreach ($data->order_data as $entry) { // $entry sind die einzelnen Objekte ...
    $menu_item_id = $entry->menu_item_id; // ... aus denen ich menu_item_id ...
    $quantity = $entry->quantity; // ... und quantity abfrage

    $stmt2 = $db->prepare('INSERT INTO orderItems ("order_id", "menu_item_id", "quantity") VALUES (:order_id, :menu_item_id, :quantity)'); // einzelne Einträge in orderItems, order_Id bleibt dieselbe
    $stmt2->bindValue(':order_id', $order_id);
    $stmt2->bindValue(':menu_item_id', $menu_item_id);
    $stmt2->bindValue(':quantity', $quantity);
    
    $result = $stmt2->execute();
}

// Prepared-Statements schützen vor SQL-Injection, indem sie verhindern, dass Eintragungen als SQL-Code gelesen werden können. Sie werden als reine Daten eingetragen.

