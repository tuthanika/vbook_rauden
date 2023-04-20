<?php
$item_list = array(


    array("title"=>"连载总点击", "input"=>"/index/book_list_data?keyword=&category_type=0&pn="),
    array("title"=>"玄幻奇幻", "input"=>"/index/book_list_data?keyword=&category_type=8&pn="),
    array("title"=>"都市青春", "input"=>"/index/book_list_data?keyword=&category_type=27&pn="),
    array("title"=>"灵异未知", "input"=>"/index/book_list_data?keyword=&category_type=1&pn="),
    array("title"=>"历史军事", "input"=>"/index/book_list_data?keyword=&category_type=30&pn="),
    array("title"=>"科幻无限", "input"=>"/index/book_list_data?keyword=&category_type=6&pn="),
    array("title"=>"游戏竞技", "input"=>"/index/book_list_data?keyword=&category_type=3&pn="),
    array("title"=>"仙侠武侠", "input"=>"/index/book_list_data?keyword=&category_type=5&pn="),
    array("title"=>"免费同人", "input"=>"/index/book_list_data?keyword=&category_type=24&pn="),
    array("title"=>"女频", "input"=>"/index/book_list_data?keyword=&category_type=11&pn="),


);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type=>application/json');
echo json_encode($json_response);

?>