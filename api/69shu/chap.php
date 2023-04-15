<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;

    $link_url =  "https://www.69shu.com/txt/".$book_id."/".$chapter_id."";

    $res_html = curl_normal_gb2312($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);

    $title = $html->find('div.txtnav > h1', 0) ->plaintext;
    $content = $html->find('div.txtnav', 0);


    $content = ($content->plaintext);
    $content = str_replace('(本章完)', '', $content); // remove trailing text
    $content = str_replace('&emsp;', '', $content); // remove trailing text
    $content = trim($content);
    $arr = explode(PHP_EOL, $content);
    $firstElement = array_shift($arr);
    $content = join('<br>', $arr);

    
    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

