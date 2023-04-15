<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url =  "http://api.17k.com/v2/book/" . $book_id . "/volumes?app_key=4037465544&price_extend=1&_versions=979&client_type=2&_filter_data=1&channel=2&merchant=17Khwyysd&_access_version=2&cps=0";
    $json1 = curl_json($link_url);
    $volumes = $json1["data"]["volumes"];

    $item_list = array();

    foreach ($volumes as $volume) {
        foreach ($volume['chapters'] as $el1) {
            $name = $el1['chapter_name'];
            $chapter_id = $el1['chapter_id'];
            $index = $el1['index'];
            $on = true;

            $item_data = array("name" => $name, "url" => $chapter_id, "index" => $index, "on" => $on);
            array_push($item_list, $item_data);
        }
    }

    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');
    echo json_encode($json_response);

?>