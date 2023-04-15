<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "https://novel.snssdk.com/api/novel/book/reader/full/v1/?group_id=" . $chapter_id . "&item_id=" . $chapter_id . "&aid=1977";

    $data = curl_json_android($link_url);
    $html1 = (string) $data['data']['content'];

    $book_id = $data['data']['novel_data']['book_id'];
    $html = str_get_html($html1);
    $content = $html->find('article', 0)->innertext;
    $title = $data['data']['title'];

    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

