<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $link_url =  "https://www.wattpad.com/api/v3/stories/" . $book_id . "";

    $book = curl_json($link_url);

    $book_name = $book['title'];
    $author = $book['user']['name'];
    $description = nl2br($book['description']);

    $cover_img = $book['cover'];
    $source = $book['url'];
    $last_publish_time = $book['modifyDate'];
    $serial_count =  $book['numParts'];
    $read_count = $book['readCount'];
    $ongoing = ($book['completed'] === true) ? '0' : '1';


    $detail  = '<b>Chapter amount:</b> '.$serial_count.' / <b>Last updated:</b> ' .$last_publish_time.' / <b>Read count:</b> ' .$read_count;
 
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


