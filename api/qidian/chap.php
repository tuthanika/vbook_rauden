<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php";

    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $chapter_id = hex2bin($chapter_id);

    $link_url =  "https://read.qidian.com/chapter/" . $chapter_id . "/";
    if (strpos($chapter_id, "f_") === 0) {
        // Remove "f_" prefix from $chapter_id

        $chapter_id = substr($chapter_id, 2);

        $link_url = "https://read.qidian.com/chapter/" . $chapter_id . "/";
      } elseif (strpos($chapter_id, "v_") === 0) {
        // Remove "v_" prefix from $chapter_id

        $chapter_id = substr($chapter_id, 2);

        $link_url = "https://vipreader.qidian.com/chapter/" . $chapter_id . "/";
      }

    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);
    $title = $html->find('h3 span.content-wrap', 0) ->plaintext;
    $content = $html->find('div.j_readContent', 0) ->plaintext;
    $content = preg_replace('/　　/u', '', $content);

    $content = nl2br($content);
    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

