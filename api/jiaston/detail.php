<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $folder_id = floor($book_id / 1000) + 1;
    $link_url = "https://contentxs.pysmei.com/BookFiles/Html/". $folder_id ."/" . $book_id . "/info.html";
    $json1 = curl_normal($link_url);

    preg_match('/"Author":"(.*?)"/', $json1, $author);
    preg_match('/"Name":"(.*?)"/', $json1, $book_name);
    preg_match('/"Desc":"(.*?)"/', $json1, $description);
    preg_match('/"Img":"(.*?)"/', $json1, $cover_img);
    preg_match('/"LastTime":"(.*?)"/', $json1, $lastime);
    preg_match('/"BookStatus":"(.*?)"/', $json1, $book_status);

    $author = $author[1];
    $book_name = $book_name[1];
    $description = $description[1];

    $cover_img = $cover_img[1];
    $last_publish_time = $lastime[1];
    $book_status = $book_status[1];
    $cover_img = "https://imgapixs.pysmei.com/BookFiles/BookImages/" . $cover_img;
    $description = nl2br($description);

    $ongoing = ($book_status ==="连载") ? '1' : '0';
    $source = $link_url;

    $detail  = '<b>Last updated:</b> ' .$last_publish_time;
    $response = array(
        'data' => array(
            'book_name' => $book_name,
            'author' => $author,
            'description' => $description,
            'cover_img' => $cover_img,
            'detail' => $detail,
            'ongoing' => $ongoing,
            'source' => $source
        )
    );

    

    header('Content-Type: application/json');
    echo json_encode($response);


?>


