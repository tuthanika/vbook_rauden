<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

if (empty($keyword)) {
    die();
}
$book_id = $keyword;

$link_url = "https://www.ishuquge.la/txt/" . $book_id . "/";

$res_html = curl_normal($link_url);
// create a new DOM object from the string
$html = str_get_html($res_html);
$info = $html->find('.info', 0);
$cover_img = $info->find('img', 0)->src;
if (strpos($cover_img, "//") === 0) {
    $cover_img = "https:" . $cover_img;
}

$description = $html->find('meta[property="og:description"]', 0)->content;
// $description = str_replace("   ", "<br>", $description);


$last_publish_time = $html->find('body > div.book > div.info > div.small > span.last', 0)->plaintext;
$last_publish_time = str_replace('更新时间：', '', $last_publish_time);
$word_count  = $html->find('body > div.book > div.info > div.small > span',3)->plaintext;
$word_count = str_replace('字数：','',$word_count);
$author = str_replace("作者：", "", $info->find('div.small > span', 0)->plaintext);
$book_name = $info->find('h2', 0)->plaintext;
$source = $link_url;

$status = $html->find('body > div.book > div.info > div.small > span', 3)->plaintext;
$ongoing = ($status !== "连载中") ? '1' : '0';

$detail = '<b>Last updated:</b> ' . $last_publish_time. ' / <b>Word count:</b> ' . $word_count;
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