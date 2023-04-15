<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url = "https://novel.html5.qq.com/cgi-bin/novel_reader/catalog?book_id=".$book_id;

    $curl = curl_init($link_url);
    $headers = array(
       "Referer: https://bookshelf.html5.qq.com/qbread/adread/catalog",
    );
    curl_setopt_array($curl, array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $link_url,
        CURLOPT_RETURNTRANSFER => 1
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    $response1 = json_decode($resp, true);
    $item_data_list = $response1["catalog"];

    $item_list = array();
    foreach ($item_data_list as $el1) {
        $chapter_number = $el1["serial_id"];
        $name = $el1["serial_name"];
        $on = true;
        
        $item_data = array("name" => $name, "url" => $chapter_number, "index" => $chapter_number, "on" => $on);
        array_push($item_list, $item_data);
    }

    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);

?>