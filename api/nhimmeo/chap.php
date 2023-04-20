<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "https://nhimmeo.cf/api/chap2.php?q=".$chapter_id."";
    $data = curl_json($link_url);
    $title = $data['data']['chapter_info']['chapter_title'];
    $content = nl2br($data['data']['chapter_info']['txt_content']);
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

