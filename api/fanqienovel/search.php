<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

    $keyw = $keyword2;
    if (!empty($keyw)) {
        $link_url = 'https://api3-normal-lf.fqnovel.com/reading/bookapi/search/tab/v/?offset=0&passback=&query=' . $keyw . '&search_id=&iid=4330291389300814&aid=1967&app_name=novelapp&version_code=56932&version_name=5.0.4.32&device_platform=android';
        $res_json = curl_json_android($link_url);
        $all_book = $res_json['search_tabs'][0]['data'];
        $item_list = array();
        foreach ($all_book as $item) {
            if (empty($item['book_data'])) {
                continue;
            }
            $cover_img = $item['book_data'][0]['thumb_url'];
            $book_id = $item['book_data'][0]['book_id'];
            $author = $item['book_data'][0]['author'];
            $book_name = $item['book_data'][0]['book_name'];
            $item_data = array("book_id" => $book_id, "book_name" => $book_name, "author" => $author, "cover_img" => $cover_img);
            array_push($item_list, $item_data);
        }
        $json_response = array("data" => array("item_list" => $item_list));
        header('Content-Type: application/json');
        echo json_encode($json_response);
    }
    else {
        die();
    }


?>