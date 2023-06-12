<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

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
    $link_url1 = $genre_item . '&page=' . $page_show;
    $res_html = curl_normal($link_url1);
    // create a new DOM object from the string
    $html = str_get_html($res_html, false);

    $li_elements = $html->find('#rank-view-list > div > ul > li');

    foreach ($li_elements as $li) {
        $book_name = html_entity_decode($li->find('h4 > a', 0)->plaintext);
        $book_id = $li->find('h4 > a', 0)->href;
        preg_match('/\/doc-truyen\/(.+)/', $book_id, $matches);
        $book_id = $matches[1];
        $book_id = bin2hex($book_id);

        $cover_img = $li->find('img', 0)->src;
        $author = html_entity_decode($li->find('.author > a.name', 0)->plaintext);

        
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
    $html->clear();
    unset($html);
}
?>