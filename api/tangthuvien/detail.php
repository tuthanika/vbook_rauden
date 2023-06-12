<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

if (empty($keyword)) {
    die();
}
$book_id = $keyword;
$book_id = hex2bin($book_id);

$link_url = "https://truyen.tangthuvien.vn/doc-truyen/" . $book_id . "";

$res_html = curl_normal($link_url);
// create a new DOM object from the string
$html = str_get_html($res_html);




// find the script tag containing the JSON-LD data
$jsonScript = $html->find('script[type="application/ld+json"]', 0);

// extract the JSON string from the tag
$jsonString = $jsonScript->innertext;

// parse the JSON string into a PHP array
$jsonData = json_decode($jsonString, true);

// extract the desired fields from the array
$title = $jsonData['headline'];

$last_publish_time = $jsonData['dateModified'];
$imageUrl = $jsonData['image']['url'];




$cover_img = $html->find('#bookImg > img', 0)->src;
if (strpos($cover_img, "//") === 0) {
    $cover_img = "https:" . $cover_img;
}
$description = html_entity_decode($html->find('.book-intro', 0)->innertext);



$author = $jsonData['author']['name'];
$book_name = html_entity_decode($html->find('h1', 0)->plaintext);
$source = $link_url;
$ongoing = strpos($html->find('p.tag', 0)->innertext, '>Đang ra<') ? '1' : '0';

$serial_count =  $html->find('#j-bookCatalogPage', 0)->plaintext;
preg_match('/\((\d+)\s*chương\)/', $serial_count, $matches);
$serial_count = $matches[1];

$detail = '<b>Chapter amount:</b> '.$serial_count.' / <b>Last updated:</b> ' . $last_publish_time;
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
$html->clear();
unset($html);

?>