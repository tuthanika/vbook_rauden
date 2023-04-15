<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url = "https://api3-normal-lf.fqnovel.com/reading/bookapi/directory/all_items/v/?need_version=true&book_id=" .$book_id . "&iid=2159861899465991&aid=1967&app_name=novelapp&version_code=311";
    $json1 = curl_json_android($link_url);
    $item_data_list = $json1['data']['item_list'];
    $item_list = array();
    $chapter_number = 0;
    foreach ($item_data_list as $el1) {
        $chapter_number++;
        $name = "第".$chapter_number."章";
        $item_id = $el1;
        $on = true;
        
        $item_data = array("name" => $name, "url" => $el1, "index" => $chapter_number, "on" => $on);
        array_push($item_list, $item_data);
    }

    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');
    echo json_encode($json_response);

?>