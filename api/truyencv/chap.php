<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $time = floor(time() / 1000);
    $sig = md5("0.jD95wSNRZQ." . $time . "." . $chapter_id);
    $link_url = "http://api.mottruyen.com/chapter/?userid=0&sig=" . $sig . "&time=" . $time . "&chapter_id=" . $chapter_id . "&os=android&app_version=1.0.6";

    $data = curl_json($link_url);
    $title = $data['data']['ENAME'];
    $content = str_replace("Người đăng: " . $data["data"]["UNAME"], "", $data["data"]["CONTENT"]);
    if (preg_match('/\(#\d+\)$/', $title)) {
        // Remove the "(#<number>)" format from the end of the string
        $title = preg_replace('/\(#\d+\)$/', '', trim($title));
    }


    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

