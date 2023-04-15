<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $chapter_id = hex2bin($chapter_id);
    $book_id = hex2bin($book_id);

    $link_url = "https://truyen.tangthuvien.vn/doc-truyen/".$book_id."/".$chapter_id."";

    
    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);

    $title = $html->find('h5', 0) ->plaintext;
    $content = trim($html->find('.box-chap', 0)->plaintext);
    $content = str_replace('    ', "<br>", $content);



    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

