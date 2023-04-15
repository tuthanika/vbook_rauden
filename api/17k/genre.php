<?php
$item_list = array(


    array("title"=>"连载总点击", "input"=>"http://api.17k.com/v2/book/solr?sort_type=4&app_key=4037465544&book_status=1&page={{page}}&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"热门总点击", "input"=>"http://api.17k.com/v2/book/solr?sort_type=4&app_key=4037465544&book_status=3&page={{page}}&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"男频总点击", "input"=>"http://api.17k.com/v2/book/solr?sort_type=4&site=2&app_key=4037465544&page={{page}}&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"女频总点击", "input"=>"http://api.17k.com/v2/book/solr?sort_type=4&site=3&app_key=4037465544&page={{page}}&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"人气总排行", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=0&time=0&page={{page}}&type=1&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"新书人气榜", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=0&time=0&page={{page}}&type=6&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"男频人气榜", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=2&time=0&page={{page}}&type=6&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"女频人气榜", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=3&time=0&page={{page}}&type=1&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"畅销总排行", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=0&time=0&page={{page}}&type=4&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"完本畅销男", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=2&time=0&page={{page}}&type=3&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"完本畅销女", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=3&time=0&page={{page}}&type=3&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"红包打赏榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=3&time=0&page={{page}}&type=5&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"免费新书榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=4&time=0&page={{page}}&type=6&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"完本好书榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=2&time=0&page={{page}}&type=3&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"出版图书榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&time=0&page={{page}}&type=7&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"荣誉称号榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&time=0&page={{page}}&type=8&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0 "),
    array("title"=>"出版物排行", "input"=>"http://api.ali.17k.com/v2/book/rank?app_key=4037465544&site=2&time=2&page={{page}}&type=7&_versions=973&client_type=1&_filter_data=1&channel=2&merchant=slhl3&_access_version=2&cps=0"),
    array("title"=>"热评排行榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=2&time=0&page={{page}}&type=9&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0"),
    array("title"=>"更新排行榜", "input"=>"http://api.17k.com/v2/book/rank?app_key=4037465544&site=0&time=0&page={{page}}&type=10&_versions=980&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0 "),

);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type=>application/json');
echo json_encode($json_response);

?>