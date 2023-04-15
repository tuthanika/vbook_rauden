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
    $link_url2 = $genre_item . "/" . $page_show.".html";
    $json2 = curl_normal($link_url2);

    $pattern = '/"Id":(\d+),"Name":"([^"]+)","Author":"([^"]+)","Img":"([^"]+)"/';
    preg_match_all($pattern, $json2, $matches, PREG_SET_ORDER);
    
    foreach ($matches as $match) {
        $id = $match[1];
        $book_name = $match[2];
        $author = $match[3];
        $cover_img = $match[4];
    
        $cover_img = str_replace("https://quapp.yphsy.com/bookfiles/bookimages/","",$cover_img);
        $cover_img = "https://imgapixs.pysmei.com/BookFiles/BookImages/" . $cover_img;

        $novel = array(
            'book_name' => $book_name,
            'book_id' => $id,
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