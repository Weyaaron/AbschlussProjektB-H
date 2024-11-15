<?php
function execute_sql($sql_as_str) {
$db = new SQLite3('./orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$prepared_statement = $db->prepare($sql_as_str);
$result = $prepared_statement->execute();
}
?>
