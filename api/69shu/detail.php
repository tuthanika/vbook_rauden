<?php
include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";
include $_SERVER['DOCUMENT_ROOT'] . "/inc/simple_html_dom.php";

if (empty($keyword)) {
    die();
}
$book_id = $keyword;

$link_url = "https://www.69shu.com/txt/" . $book_id . ".htm";

$res_html = curl_normal_gb2312($link_url);
// create a new DOM object from the string
$html = str_get_html($res_html);
$cover_img = $html->find('.bookimg2 img', 0)->src;

$description = $html->find('.navtxt', 0)->innertext;
// $description = str_replace('<div class="navtxt">','',$description);
// $description = str_replace('</div>','',$description);

$description = trim(str_replace("&nbsp;", "", $description));
$last_publish_time = $html->find('body > div.container > ul > li.col-8 > div:nth-child(1) > div > div.booknav2 > p:nth-child(5)', 0)->plaintext;
// $last_publish_time = str_replace("更新：", "", $last_publish_time);

$last_publish_time = explode('更新：', $last_publish_time)[1];
$last_publish_time = trim($last_publish_time);
$author = $html->find('body > div.container > ul > li.col-8 > div:nth-child(1) > div > div.booknav2 > p:nth-child(2) > a', 0)->plaintext;
$book_name = $html->find('body > div.container > ul > li.col-8 > div:nth-child(1) > div > div.booknav2 > h1 > a', 0)->plaintext;
$source = $link_url;

$serial_count = $html->find('ul.infolist li', 1)->plaintext;
preg_match('/\d+/', $serial_count, $matches);
$serial_count = $matches[0];
$status = $html->find('body > div.container > ul > li.col-8 > div:nth-child(1) > div > div.booknav2 > p:nth-child(4)', 0)->plaintext;
$ongoing = (strpos($status, "连载") !== false) ? '1': '0';
$word_number = $html->find('ul.infolist li', 0)->plaintext;
$word_number = trim(str_replace('字数', '', $word_number));

$detail  = '<b>Chapter amount:</b> '.$serial_count.' / <b>Last updated:</b> ' .$last_publish_time.' / <b>Word count:</b> ' .$word_number;

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