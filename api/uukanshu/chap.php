<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;

    $link_url =  "https://sj.uukanshu.com/read.aspx?tid=".$book_id."&sid=".$chapter_id."";


    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);

    $title = $html->find('#divContent > h3', 0) ->plaintext;
    $contentBox = $html->find('#bookContent', 0);

    foreach($contentBox->find('.ad_content') as $adContent) {
        $adContent->outertext = '';
    }
    foreach($contentBox->find('.box') as $adContent) {
        $adContent->outertext = '';
    }
    $content = $contentBox->innertext;
    $content = preg_replace('/[UＵ][UＵ]\s*看书\s*[wｗ][wｗ][wｗ][\.．][uｕ][uｕ][kｋ][aａ][nｎ][sｓ][hｈ][uｕ][\.．][cｃ][oｏ][mｍ]/ui', '', $content);
    $content = preg_replace('/&nbsp;/u', '', $content);
    
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

