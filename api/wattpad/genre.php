<?php
$item_list = array(


    array("title" => "Mới cập nhật", "input" => "https://www.wattpad.com/api/v3/stories?filter=new&fields=stories(id,title,url,cover,user(name))&limit=20&offset="),



);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type: application/json');
echo json_encode($json_response);

?>