<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

    if (empty($page_show)) {
        $page_show = '1';
      }
    if (!empty($keyword2)) {
        $link_url = "https://truyen.tangthuvien.vn/ket-qua-tim-kiem?term=".$keyword2."";
        $res_html = curl_normal($link_url);
        $html = str_get_html($res_html);
        $li_elements = $html->find('#rank-view-list > div > ul > li');
        // echo $li_elements;
        $item_list = array();
        foreach($li_elements as $li) {

            // Extract the book ID from the URL
            $book_id = $li->find('a', 0)->href;
            preg_match('/\/doc-truyen\/(.+)/', $book_id, $matches);
            $book_id = $matches[1];
            $book_id = bin2hex($book_id);
    
            // Extract the cover image URL
            $cover_img = $li->find('img', 0)->src;
            // Extract the book name
            $book_name = trim($li->find('h4', 0)->plaintext);
            
            // Extract the author
            $author = $li->find('p.author > a.name', 0)->plaintext;

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