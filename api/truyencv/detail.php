<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $link_url =  "http://api.mottruyen.com/story/?story_id=" . $book_id . "";

    $res_json = curl_json($link_url);
    $book = $res_json['data'];

    $book_name = $book['NAME'];
    $author = $book['AUTHOR'];
    $description = $book['DESC'];

    $cover_img = $book['IMG'];
    preg_match('/\/([a-z-]+)\/\d+\.jpg/', $cover_img, $matches);
    $source = "https://metruyencv.com/truyen/".$matches[1];



    $serial_count =  $book['TOTALCHAPTER'];
    $ongoing = '-1';

    $detail  = '<b>Chapter amount:</b> '.$serial_count.' / <b>Categories:</b> ' .$book["CAT"];
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


