<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }

    $book_id  = $keyword;
    $folder_id = floor($book_id / 1000) + 1;

    $link_url = "https://contentxs.pysmei.com/BookFiles/Html/". $folder_id ."/" . $book_id . "/";

    $json1 = curl_normal($link_url);

    preg_match_all('/"id":(\d+),"name":"(.*?)","hasContent":(\d+)/', $json1, $item_data_list, PREG_SET_ORDER);

    $item_list = array();
    $chapter_number = 0;
    foreach ($item_data_list as $el1) {
        $chapter_number++;
        preg_match('/"id":(\d+),"name":"(.*?)","hasContent":(\d+)/', $el1[1], $temp);
        $name = $el1[2];
        $hasContent = $el1[3];
        $on = ($hasContent === "1") ? true : false;
        $chapter_id  = $el1[1];
        $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
        array_push($item_list, $item_data);
        
    }

    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);

?>