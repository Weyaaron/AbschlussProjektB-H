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
$quantity = $data->quantity;

for ($menu_item_id = 1; $menu_item_id < 4; $menu_item_id++) {
    $stmt2 = $db->prepare('INSERT INTO orderItems ("order_id", "menu_item_id", "quantity") VALUES (:order_id, :menu_item_id, :quantity)'); // einzelne Einträge in orderItems, order_Id bleibt dieselbe
    $stmt2->bindValue(':order_id', $order_id);
    $stmt2->bindValue(':menu_item_id', $menu_item_id);
    $stmt2->bindValue(':quantity', $quantity);


    $result = $stmt2->execute();
} 

// Idee dahinter:  - menuItems werden pro Bestellung durchiteriert und hinzugefügt
//                 - es gibt derzeit 3 menuItems (Vanille, Schoko, Erdbeere), Schleife ist beendet, wenn die Ids der Eissorten durch sind
//                 - quantity ist Nullable, wenn also eine Sorte nicht ausgewählt wurde, wird dafür auch nichts aufgerechnet
//                 - if-Statement, if menu_item_id !0 ...

// ein prepared statement mehrmals ausführen in einer Schleife, um die einzelnen Menu_Items einzufügen
