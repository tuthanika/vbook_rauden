<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

    if (!empty($keyword2)) {
        $link_url = "https://nhimmeo.cf/api/search.php?page=1&q=" . $keyword2;
        $res_json = curl_json($link_url);
        $all_book = $res_json['data']['book_list'];
        $item_list = array();
        foreach ($all_book as $e1) {
            $book_id = $e1['book_id'];

            $cover_img = $e1['cover'];
            $cover_img = str_replace('http://', 'https://', $cover_img);
            $author = $e1['author_name'];
            $book_name = $e1["book_name"];

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