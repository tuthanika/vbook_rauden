<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "https://www.wattpad.com/v4/parts/" . $chapter_id . "";
    $data = curl_json($link_url);
    $title = $data['title'];
    $link_url1 = "https://www.wattpad.com/apiv2/storytext?id=" . $chapter_id . "";
    $data1 = curl_normal2($link_url1);

    $content = $data1;



    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

