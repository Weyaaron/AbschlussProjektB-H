<?php
 $json = [
["id"=> 1, "name"=> "Vanille", "description"=> "Vanille-Eis", "price"=>1.5 ],
["id"=> 2, "name"=> "Schokolade", "description"=> "Schokoladen-Eis", "price"=> 1.5 ],
["id"=> 3, "name"=> "Erdbeer", "description"=> "Erdbeer-Eis", "price"=> 1.5 ]
]; 

/*
 * Alternativer Code 
 $myObj = new stdClass();

$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj); */

echo json_encode($json);
?>