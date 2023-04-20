<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url =  "https://zh.nhimmeo.cf/ci_api/catalog3.php?q=" . $book_id . "";
    $json1 = curl_json($link_url);

    $item_list = array();

    foreach ($json1 as $el1) {
        $name = $el1['title'];
        $chapter_id = $el1['id'];
        $index = $el1['index'];
        $on = ($el1['auth_access'] === '1') ? true : false;

        $item_data = array("name" => $name, "url" => $chapter_id, "index" => $index, "on" => $on);
        array_push($item_list, $item_data);
    }


    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');
    echo json_encode($json_response);

?>