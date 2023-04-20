<?php
$item_list = array(

    array("title"=>"都市", "input"=>"/category/3_"),

);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type=>application/json');
echo json_encode($json_response);

?>