<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "http://api.17k.com/v2/book/".$book_id."/chapter/".$chapter_id."/content?app_type=8&app_key=4037465544&_versions=979&client_type=1&_filter_data=1&channel=2&merchant=17Khwyysd&_access_version=2&cps=0";
    $data = curl_json($link_url);
    $title = $data['data']['name'];
    $content = nl2br($data['data']['content']);
    $content = preg_replace('/　　/u', '', $content);

    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

