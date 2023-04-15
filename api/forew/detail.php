<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

if (empty($keyword)) {
    die();
}
$book_id = $keyword;
$book_id = hex2bin($book_id);
$link_url = "https://forew.7m.pl/temp/" . $book_id . "/total.txt";

$res_html = curl_normal($link_url);
$lines = explode("\n", $res_html);

// create a new DOM object from the string
$cover_img = "/assets/images/noimg_1.jpg";
$description = "";



$author = "Unknown";
$book_name = $lines[0];
$book_name = str_replace(".txt", "", $book_name);

$chapter_amount = $lines[1];
$source = $link_url;

$ongoing = '-1';

$detail = '<b>Chapter amount:</b> ' . $chapter_amount;
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