<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $book_id = $kfolder;
    $folder_id = floor($book_id / 1000) + 1;
    $link_url = "https://contentxs.pysmei.com/BookFiles/Html/" . $folder_id."/"  . $book_id."/". $chapter_id.".html";

    $response = curl_normal($link_url);
    $regex = '/{"status":(\d+),"info":"([^"]*)","data":{"id":(\d+),"name":"([^"]*)","cid":(\d+),"cname":"([^"]*)","pid":(\d+),"nid":(-?\d+),"content":"([^"]*)","hasContent":(\d+)}}/';
    if (preg_match($regex, $response, $matches)) {
        $title = $matches[6];
        $content = $matches[9];
        $content = str_replace('\r\n　　\r\n　　    ', '<br>', $content);
        $content = str_replace('\f\t\n', '<br>', $content);
        $content = str_replace('\r\n', '<br>', $content);
        $content = str_replace('　　', '', $content);
        $content = trim($content,"<br>");

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

