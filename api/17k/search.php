<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

    if (!empty($keyword2)) {
        $link_url = "https://so.html5.qq.com/ajax/real/search_result?tabId=360&noTab=1&q=" . $keyword2;
        $res_json = curl_json($link_url);
        $all_book = $res_json['data']['state'];
        $item_list = array();
        foreach ($all_book as $e) {
            if (isset($e["items"]) && count($e["items"]) > 0) {
                $e1 = $e["items"][0];
                $jump_url = $e1["jump_url"];
                preg_match('/bookid=(\d+)/', $jump_url, $matches);

                $book_id = $matches[1];
                $cover_img = $e1['cover_url'];
                $cover_img = str_replace('http://', 'https://', $cover_img);
                $author = $e1['author'];
                $book_name = $e1["title"];

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