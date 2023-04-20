<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

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
    $link_url2 = "https://www.qidian.com".$genre_item;
    $month = str_pad((date('n') + 1), 2, '0', STR_PAD_LEFT);
    $year = date('Y');
    $link_url2 = str_replace('{page}', $page_show, $link_url2);
    $link_url2 = str_replace('{month}', $month, $link_url2);
    $link_url2 = str_replace('{year}', $year, $link_url2);
    $res_html = curl_normal($link_url2);
    // create a new DOM object from the string
    $html = str_get_html($res_html);
    $li_elements = $html->find('#rank-view-list > div > ul > li');

    foreach($li_elements as $li) {
        // Extract the book name
        $book_name = trim($li->find('div.book-mid-info > h2', 0)->plaintext);
        // Extract the book ID from the URL
        $book_id = $li->find('a', 0)->getAttribute('data-bid');

        // Extract the cover image URL
        $cover_img = $li->find('img', 0)->src;

        // Extract the author
        $author = $li->find('a.name', 0)->plaintext;

        $item_data = array("book_id" => $book_id, "book_name" => $book_name, "author" => $author, "cover_img" => $cover_img);
        array_push($item_list, $item_data);
    
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