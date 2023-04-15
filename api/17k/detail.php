<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $source = "https://www.17k.com/book/".$book_id.".html";
    $link_url =  "http://api.17k.com/v2/book/" . $book_id . "/volumes?app_key=4037465544&price_extend=1&_versions=979&client_type=2&_filter_data=1&channel=2&merchant=17Khwyysd&_access_version=2&cps=0";
    
    $res_json = curl_json($link_url);
    $book = $res_json['data'];

    $book_name = $book['book_name'];
    $author = $book['author_name'];
    // $free_status = $res_json['data']['book_info']['free_status'];
    $description = nl2br($book['intro']);

    $cover_img = $book['cover'];

    $cover_img = str_replace('http://', 'https://', $cover_img);
    $epoch  = $book['update_at'];
    $last_publish_time = new DateTime("@$epoch");
    $last_publish_time = $last_publish_time->format('Y-m-d H:i:s');
    $serial_count =  $book['chapter_total'];
    $word_number = $book['word_count'];
    $ongoing = ($book['book_status'] === "03") ? '1' : '0';

    $detail  = '<b>Chapter amount:</b> '.$serial_count.' / <b>Last updated:</b> ' .$last_publish_time.' / <b>Word count:</b> ' .$word_number;
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


