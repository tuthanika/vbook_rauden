<?php
    error_reporting(E_ERROR | E_PARSE);

    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php"; 

    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $book_id = hex2bin($book_id);
    $link_url = "https://forew.7m.pl/temp/" . $book_id . "/total.txt";
    
    $res_html = curl_normal($link_url);
    $lines = explode("\n", $res_html);
    $catalog = ($lines[2] === "catalog") ? true : false;
    $chapter_amount = $lines[1];
    $item_list = array();
    $chapter_number = 0;

    if($catalog) {
        for ($x = 1; $x <= $chapter_amount; $x++) {
            $chapter_number++;
            $name = $lines[$x+2];
            $chapter_id = $x."_".$name;
            $chapter_id = bin2hex($chapter_id);
            $on = true;
            $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
            array_push($item_list, $item_data);
        }
    }

    else {
        for ($x = 1; $x <= $chapter_amount; $x++) {
            $chapter_number++;
            $name = "第".$x."章";
            $chapter_id = $x;
            $on = true;
            $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
            array_push($item_list, $item_data);
        }


    }



    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);

?>