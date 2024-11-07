<?php
$db = new SQLite3('./../orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

$menu = [];
$stmt = $db->prepare('Select * from menuItem');
$result = $stmt->execute();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    array_push($menu, $row);
}

echo json_encode($menu);

?>
