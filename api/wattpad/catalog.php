<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url =  "https://www.wattpad.com/api/v3/stories/" . $book_id . "";
    $json1 = curl_json($link_url);

    $item_data_list = $json1["parts"];
    $chapter_number = 0;

    $item_list = array();
    foreach ($item_data_list as $el1) {
        $chapter_number++;
        $name = $el1["title"];
        $chapter_id = $el1["id"];
        $on = true;
        $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
        array_push($item_list, $item_data);
    }


    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');
    echo json_encode($json_response);

?>