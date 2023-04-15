<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $book_id = hex2bin($book_id);
    $chapter_id = hex2bin($chapter_id);
    $parts = explode("_", $chapter_id);
    $title = $parts[1];
    $chapter_id = $parts[0];

    $link_url = "https://forew.7m.pl/temp/" . $book_id . "/file".$chapter_id.".txt";

    $res_html = curl_normal($link_url);

    $content = nl2br($res_html);
    
    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

