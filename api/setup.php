<?php

$db = new SQLite3('./orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$menu = [];
$stmt = $db->prepare('create table menuItem(id int auto_increment, name varchar(100), description varchar(255), price double)'); // TODO: SQL query
$result = $stmt->execute();

/* while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
array_push($menu, $row);
} */