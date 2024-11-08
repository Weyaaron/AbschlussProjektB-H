<?php


function execute_sql($sql_as_str) {

$db = new SQLite3('./orders.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$prepared_statement = $db->prepare($sql_as_str);
$result = $prepared_statement->execute();

}
execute_sql('create table menuItem(id integer primary key, name varchar(100), description varchar(255), price decimal)');
execute_sql('create table orders(id integer primary key, created datetime)');
execute_sql('create table orderItems(id integer primary key, order_id int, menu_item_id int, quantity int, foreign key (order_id) references orders(id), foreign key (menu_item_id) references menuItem(id))');
execute_sql('insert into menuItem (name, description, price) values ("Vanille", "Milcheis mit echter Bourbon Vanille", 2.99), ("Schokolade", "hoher Anteil an belgischer Schokolade", 2.55), ("Erdbeer", "mit echten Erdbeeren", 2.29)');
