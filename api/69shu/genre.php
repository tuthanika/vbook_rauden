<?php
$item_list = array(

    array("title"=>"全部分类", "input"=>"/ajax_top/0/{{page}}.htm"),
    array("title"=>"言情小说", "input"=>"/ajax_top/3/{{page}}.htm"),
    array("title"=>"玄幻魔法", "input"=>"/ajax_top/1/{{page}}.htm"),
    array("title"=>"修真武侠", "input"=>"/ajax_top/2/{{page}}.htm"),
    array("title"=>"穿越时空", "input"=>"/ajax_top/11/{{page}}.htm"),
    array("title"=>"都市小说", "input"=>"/ajax_top/9/{{page}}.htm"),
    array("title"=>"历史军事", "input"=>"/ajax_top/4/{{page}}.htm"),
    array("title"=>"游戏竞技", "input"=>"/ajax_top/5/{{page}}.htm"),
    array("title"=>"科幻空间", "input"=>"/ajax_top/6/{{page}}.htm"),
    array("title"=>"悬疑惊悚", "input"=>"/ajax_top/7/{{page}}.htm"),
    array("title"=>"同人小说", "input"=>"/ajax_top/8/{{page}}.htm"),
    array("title"=>"官场职场", "input"=>"/ajax_top/10/{{page}}.htm"),
    array("title"=>"青春校园", "input"=>"/ajax_top/12/{{page}}.htm"),


);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type: application/json');
echo json_encode($json_response);

?>