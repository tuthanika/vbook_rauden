<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

if (empty($page_show)) {
    $page_show = '1';
}
$cweb = explode('/', parse_url("$_SERVER[REQUEST_URI]", PHP_URL_PATH))[2];
$link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/genre.php";
$json1 = curl_json($link_url);
$genre_item_list = $json1['data']['item_list'];
$genre_item = $genre_item_list[$index]["input"];
$genre_item_title = $genre_item_list[$index]["title"];

if (!empty($genre_item)) {
    $item_list = array();
    $json2 = curl_json($genre_item . "&page=" . $page_show);
    foreach ($json2["data"] as $item) {
        $novel = array(
            'book_name' => $item['NAME'],
            'book_id' => $item['ID'],
            'cover_img' => $item['THUMB'],
            'author' => $item['AUTHOR'],
        );
        array_push($item_list, $novel);
    }

    $json_response = array(
        "data" =>
        array("item_list" => $item_list)
    );
    $json_response["data"]["title"] = $genre_item_title;
    header('Content-Type: application/json');
    echo json_encode($json_response);
}
?>