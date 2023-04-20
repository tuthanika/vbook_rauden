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
    $link_url1 = "https://mip.ciweimao.com".$genre_item.$page_show;
    $string = curl_normal($link_url1);
    $regex = '/"book_id":"(.*?)","cover":"(.*?)","book_name":"(.*?)","author_name":"(.*?)"/';
    preg_match_all($regex, $string, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $book_id = $match[1];
            $cover = $match[2];

            $book_name = $match[3];
            $book_name = json_decode('"' . $book_name . '"');

            $author_name = $match[4];
            $author_name = json_decode('"' . $author_name . '"');

            $novel = array(
                'book_name' => $book_name,
                'book_id' => $book_id,
                'cover_img' => $cover,
                'author' => $author_name,
            );
            array_push($item_list, $novel);
        }
    }

    $json_response = array(
        "data" =>
        array("item_list" => $item_list)
    );
    $json_response["data"]["title"] = $genre_item_title;
    header('Content-Type: application/json');
    echo json_encode($json_response);

?>