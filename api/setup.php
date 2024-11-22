<?php


function execute_sql($sql_as_str) {

$db = new SQLite3('./orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$prepared_statement = $db->prepare($sql_as_str);
$result = $prepared_statement->execute();
$prepared_statement->close();// new 
return $result;

}

if(!file_exists('./orders.db')) {    // soll prüfen ob  die DB schon erstellt wurde 

execute_sql('create table if not exists menuItem(id integer primary key, name varchar(100), description varchar(255), price decimal)');
execute_sql('create table if not exists orders(id integer primary key, created datetime)');
execute_sql('create table if not exists orderItems(id integer primary key, order_id int, menu_item_id int, quantity int, foreign key (order_id) references orders(id), foreign key (menu_item_id) references menuItem(id))');
execute_sql('insert into menuItem (name, description, price) values ("Vanille", "Milcheis mit echter Bourbon Vanille", 2.00), ("Schokolade", "hoher Anteil an belgischer Schokolade", 2.50), ("Erdbeer", "mit echten Erdbeeren", 3.00)');

} else {
    echo " Tabellen wurden schon erstellt ";
}
?>