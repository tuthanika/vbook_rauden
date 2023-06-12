<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    if (empty($page_show)) {
        $page_show = '1';
      }
    if (!empty($keyword2)) {
        $link_url = "http://api.mottruyen.com/tim-kiem/?page_number=" . $page_show. "&k=" . $keyword2 . "&os=android";
        $res_json = curl_json($link_url);
        $all_book = $res_json['data'];
        
        $item_list = array();
        foreach ($all_book as $e1) {
            if (isset($e1)) {
                $book_id = $e1['ID'];
                $cover_img = $e1['THUMB'];
                $author = $e1['AUTHOR'];
                $book_name = $e1["NAME"];
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