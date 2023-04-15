<?php

include $_SERVER['DOCUMENT_ROOT'] . "/inc/function.php";

if (empty($page_show)) {
    $page_show = '1';
}
$cweb = explode('/', parse_url("$_SERVER[REQUEST_URI]", PHP_URL_PATH))[2];
$link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/genre.php";
$json1 = curl_json($link_url);

$genre_item_list = $json1['data']['item_list'];
$genre_item = "https://bookshelf.html5.qq.com/qbread/api/rank/list".$genre_item_list[$index]["input"];
$genre_item_title = $genre_item_list[$index]["title"];

if (!empty($genre_item)) {
    $item_list = array();
    $link_url1 = str_replace('{{page}}', $page_show, $genre_item);
    $curl = curl_init($link_url1);
    $headers = array(
       "Referer: https://bookshelf.html5.qq.com/qbread/categorylist?traceid=0809004&sceneid=FeedsTab&strageid=&ch=001995&tabfrom=top&feeds_version=8516&reader_version=0&groupid=1501&tag_type_id=1",
    );
    curl_setopt_array($curl, array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $link_url1,
        CURLOPT_RETURNTRANSFER => 1
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    $json2 = json_decode($resp, true);

    foreach ($json2["rows"] as $item) {
        $novel = array(
            'book_name' => $item['resourceName'],
            'book_id' => $item['resourceID'],
            'cover_img' => $item['picurl'],
            'author' => $item['author'],
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