<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;

    $link_url =  "https://www.ishuquge.la/txt/".$book_id."/".$chapter_id.".html";


    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);

    $title = $html->find('h1', 0) ->plaintext;
    $contentBox = $html->find('#content', 0);

    foreach($contentBox->find('#center_tip') as $adContent) {
        $adContent->outertext = '';
    }

    $content = $contentBox->innertext;
    $content = preg_replace('/&nbsp;/u', '', $content);
    $content = explode('https://www.ishuquge.la', $content)[0];
    
    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);
    $html->clear();
    unset($html);

?>

