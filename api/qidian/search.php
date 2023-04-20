<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

    if (empty($page_show)) {
        $page_show = '1';
      }
    if (!empty($keyword2)) {
        $link_url = "https://www.qidian.com/soushu/".$keyword2.".html";
        $res_html = curl_normal($link_url);
        $html = str_get_html($res_html);
        $li_elements = $html->find('#result-list > div > ul > li');
        // echo $li_elements;
        $item_list = array();
        foreach($li_elements as $li) {

            // Extract the book ID from the URL
            $book_id = $li->find('a', 0)->getAttribute('data-bid');

            // Extract the cover image URL
            $cover_img = $li->find('img', 0)->src;
            // Extract the book name
            $book_name = trim($li->find('h2.book-info-title', 0)->plaintext);
            
            // Extract the author
            $author = $li->find('a.name', 0)->plaintext;

            $item_data = array("book_id" => $book_id, "book_name" => $book_name, "author" => $author, "cover_img" => $cover_img);
            array_push($item_list, $item_data);
        
        }
        $json_response = array("data" => array("item_list" => $item_list));
        header('Content-Type: application/json');

        echo json_encode($json_response);
        $html->clear();
        unset($html);
    }
    else {
        die();
    }


?>