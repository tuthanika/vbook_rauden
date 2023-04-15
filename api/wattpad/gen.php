<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

if (empty($page)) {
    $page = '0';
}
$cweb = explode('/', parse_url("$_SERVER[REQUEST_URI]", PHP_URL_PATH))[2];
$link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/genre.php";
$json1 = curl_json($link_url);

$genre_item_list = $json1['data']['item_list'];
$genre_item = $genre_item_list[$index]["input"];
$genre_item_title = $genre_item_list[$index]["title"];

if (!empty($genre_item)) {
    $item_list = array();
    $link_url1 = $genre_item.$page;
    $json2 = curl_json($link_url1);

    foreach ($json2["stories"] as $item) {
        $novel = array(
            'book_name' => $item['title'],
            'book_id' => $item['id'],
            'cover_img' => $item['cover'],
            'author' => $item['user']['name'],
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