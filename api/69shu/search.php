<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

    if (empty($page_show)) {
        $page_show = '1';
      }
    if (!empty($keyword)) {
        $urlEncodedKey = urlencode(iconv('UTF-8', 'GB18030', $keyword));
        $link_url = "https://www.69shu.com/modules/article/search.php?searchkey=".$urlEncodedKey."&searchtype=all";
        $res_html = curl_normal_gb2312($link_url);
        $html = str_get_html($res_html);
        $li_elements = $html->find('.newbox > ul > li');
        // echo $li_elements;
        $item_list = array();
        foreach($li_elements as $li) {

            // Extract the book ID from the URL
            $book_id = $li->find('a', 0)->href;
            preg_match('/(\d+)\.htm$/', $book_id, $matches);
            $book_id = $matches[1];

            // Extract the cover image URL
            $cover_img = $li->find('img', 0)->getAttribute('data-src');
            // Extract the book name
            $book_name = trim($li->find('h3', 0)->plaintext);
            
            // Extract the author
            $author = $li->find('.labelbox label', 0)->plaintext;

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