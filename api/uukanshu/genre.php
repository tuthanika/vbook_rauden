<?php
$item_list = array(


    array("title"=>"玄幻奇幻", "input"=>"/list/xuanhuan"),
    array("title"=>"都市言情", "input"=>"/list/yanqing"),
    array("title"=>"武侠仙侠", "input"=>"/list/xianxia"),
    array("title"=>"军事历史", "input"=>"/list/lishi"),
    array("title"=>"网游竞技", "input"=>"/list/wangyou"),
    array("title"=>"科幻灵异", "input"=>"/list/lingyi"),
    array("title"=>"女生同人", "input"=>"/list/tongren"),
    array("title"=>"二次元", "input"=>"/list/erciyuan"),
    array("title"=>"全本小说", "input"=>"/list/quanben"),


);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type=>application/json');
echo json_encode($json_response);

?>