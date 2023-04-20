<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

    if (!empty($keyword2)) {
        $link_url = "http://api.17k.com/v2/book/search?app_key=4037465544&sort_type=0&page=0&class=0&key=".$keyword2."&_versions=971&client_type=1&_filter_data=1&channel=2&merchant=17KH5&_access_version=2&cps=0";
        $res_json = curl_json($link_url);
        $all_book = $res_json['data'];
        $item_list = array();
        foreach ($all_book as $e1) {
            if (isset($e1["id"])) {

                $book_id = $e1['id'];
                $cover_img = $e1['cover'];
                $cover_img = str_replace('http://', 'https://', $cover_img);
                $author = $e1['author_name'];
                $book_name = $e1["book_name"];

                $item_data = array("book_id" => $book_id, "book_name" => $book_name, "author" => $author, "cover_img" => $cover_img);
                array_push($item_list, $item_data);
            }
        }
        $json_response = array("data" => array("item_list" => $item_list));
        header('Content-Type: application/json');
        echo json_encode($json_response);
    }
    else {
        die();
    }


?>