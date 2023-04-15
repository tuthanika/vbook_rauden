<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

if (empty($keyword)) {
    die();
}
$book_id = $keyword;

$link_url = "https://sj.uukanshu.com/book.aspx?id=" . $book_id . "";

$res_html = curl_normal($link_url);
// create a new DOM object from the string
$html = str_get_html($res_html);
$info = $html->find('.book-info', 0);
$cover_img = $info->find('.pic img', 0)->src;
if (strpos($cover_img, "//") === 0) {
    $cover_img = "https:" . $cover_img;
}
$description = $info->find('.desc', 0)->plaintext;
$description = str_replace("作品简介：", "", $description);
$description = preg_replace('/　　/u', '<br>', $description);

$last_publish_time = $html->find('#book-sp div.book-info dl dd:nth-child(4) span', 0)->plaintext;


$author = str_replace("作者：", "", $info->find('dd', 0)->plaintext);
$book_name = $info->find('h1.bookname', 0)->plaintext;
$source = "https://www.uukanshu.com/b/" . $book_id . "/";

$status = $html->find('#book-sp div.book-info dl dd:nth-child(3)', 0)->plaintext;
$ongoing = ($status !== "完结") ? '0' : '1';

$detail = '<b>Last updated:</b> ' . $last_publish_time;
$response = array(
    'data' => array(
        'book_name' => $book_name,
        'author' => $author,
        'description' => $description,
        'cover_img' => $cover_img,
        'detail' => $detail,
        'ongoing' => $ongoing,
        'source' => $source
    )
);



header('Content-Type: application/json');
echo json_encode($response);


?>