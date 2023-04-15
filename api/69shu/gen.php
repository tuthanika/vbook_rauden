<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

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
    $link_url1 = str_replace('{{page}}', $page, 'https://www.69shu.com'.$genre_item);
    $res_html = curl_normal($link_url1);
    $res_html = mb_convert_encoding($res_html, 'utf-8', "gb18030");
    // create a new DOM object from the string
    $html = str_get_html($res_html, false);

    $li_elements = $html->find('li');

    foreach ($li_elements as $li) {
        $book_name = trim($li->find('h3', 0)->plaintext);
        $book_id = $li->find('a', 0)->href;
        preg_match('/(\d+)\.htm$/', $book_id, $matches);
        $book_id = $matches[1];
        $cover_img = $li->find('img', 0)->getAttribute('data-src');
        $author = $li->find('.labelbox label', 0)->plaintext;

        $novel = array(
            'book_name' => $book_name,
            'book_id' => $book_id,
            'cover_img' => $cover_img,
            'author' => $author,
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