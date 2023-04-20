<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

    if (empty($page_show)) {
        $page_show = '1';
      }

    function curl_2($searchkey) {

        $url = "https://www.ishuquge.la/search.php";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers1 = array(
           "Origin: https://www.ishuquge.la",
           "Referer: https://www.ishuquge.la/search.php",
           "Content-Type: application/x-www-form-urlencoded",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers1);
        
        $data = "searchkey=".$searchkey;
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    
    if (!empty($keyword2)) {
        $res_html = curl_2($keyword);
        $html = str_get_html($res_html);
        $li_elements = $html->find('body > div.wrap > div > div.bookbox');
        // echo $li_elements;
        $item_list = array();
        foreach($li_elements as $li) {

            // Extract the book ID from the URL
            $book_id = $li->find('a', 0)->href;
            preg_match('/\/txt\/(\d+)/', $book_id, $matches);
            $book_id = $matches[1];
    
            // $cover_img = "/assets/images/noimg_1.jpg";
            // Extract the book name
            $book_name = trim($li->find('h4', 0)->plaintext);
            $cover_img = "https://www.ishuquge.la/files/article/image/" . intval($book_id / 1000) . "/" . $book_id . "/" . $book_id . "s.jpg";

            // Extract the author
            $author = $li->find('div.author', 0)->plaintext;
            $author = str_replace("作者：", "", $author);

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