<?php
$item_list = array(


    array("title" => "起点月票榜", "input" => "/rank/yuepiao/year{year}-month{month}-page{page}/"),
    array("title" => "24小时热销榜", "input" => "/rank/hotsales/page{page}/"),
    array("title" => "阅读指数榜", "input" => "/rank/readindex/page{page}/"),
    array("title" => "推荐票榜", "input" => "/rank/recom/page{page}/"),
    array("title" => "收藏榜", "input" => "/rank/collect/page{page}/"),
    array("title" => "更新榜", "input" => "/rank/vipup/page{page}/"),
    array("title" => "VIP收藏榜", "input" => "/rank/vipcollect/page{page}/"),
    array("title" => "签约作者新书榜", "input" => "/rank/signnewbook/page{page}/"),
    array("title" => "公众作者新书榜", "input" => "/rank/pubnewbook/page{page}/"),
    array("title" => "新人签约新书榜", "input" => "/rank/newsign/page{page}/"),
    array("title" => "新人作者新书榜", "input" => "/rank/newauthor/page{page}/"),
    array("title" => "女生网", "input" => "/mm/rank/yuepiao/page{page}/"),

);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type: application/json');
echo json_encode($json_response);

?>