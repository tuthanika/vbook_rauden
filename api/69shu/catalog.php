<?php

    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php"; 

    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url =  "https://www.69shu.com/" . $book_id . "/";

    $res_html = curl_normal_gb2312($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html, false);

    $li_elements = $html->find('#catalog > ul > li');
    $item_list = array();
    $chapter_number = 0;
    // loop through the li elements and output their text content
    foreach ($li_elements as $li) {
        $linkElement = $li->find('a', 0);
        if (!empty($linkElement)) {
            $chapter_number = $li->getAttribute('data-num');

            $name = $li->find('a', 0)->plaintext;
            $chapter_id = $li->find('a', 0)->href;

            preg_match('/\/(\d+)$/', $chapter_id, $matches);
            $chapter_id = $matches[1];
            $on = true;



            $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
            array_push($item_list, $item_data);
        }
        
    }



    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);
    $html->clear();
    unset($html);
?>