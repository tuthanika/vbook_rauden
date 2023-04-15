<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    if (empty($page_show)) {
        $page_show = '1';
      }
    if (!empty($keyword2)) {
        $link_url = "https://www.wattpad.com/v4/search/stories?query=" . $keyword2 . "&fields=stories(id,title,url,cover,user(name))&offset=" . $page_show . "&limit=10";
        $res_json = curl_json($link_url);
        $all_book = $res_json['stories'];
        
        $item_list = array();
        foreach ($all_book as $e1) {
            if (isset($e1)) {
                $book_id = $e1['id'];
                $cover_img = $e1['cover'];
                $author = $e1['user']['name'];
                $book_name = $e1["title"];
                $item_data = array("book_id" => $book_id, "book_name" => $book_name, "author" => $author, "cover_img" => $cover_img);
                array_push($item_list, $item_data);
            }
        }
        $json_response = array("data" => array("item_list" => $item_list));
        echo json_encode($json_response);
    }
    else {
        die();
    }


?>