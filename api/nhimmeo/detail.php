<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $source = "https://nhimmeo.cf/book/".$book_id."";
    $link_url =  "https://nhimmeo.cf/api/detail.php?q=" . $book_id . "";
    
    $string = curl_normal($link_url);
    $regex = '/"book_id":"(.*?)","book_name":"(.*?)","description":"(.*?)","book_src":"(.*?)","category_index":"(.*?)","tag":"(.*?)","total_word_count":"(.*?)","up_status":"(.*?)","update_status":"(.*?)","is_paid":"(.*?)","discount":"(.*?)","discount_end_time":"(.*?)","cover":"(.*?)","author_name":"(.*?)","uptime":"(.*?)","newtime":"(.*?)","review_amount":"(.*?)","reward_amount":"(.*?)","chapter_amount":"(.*?)","is_original":"(.*?)"/s';
    preg_match($regex, $string, $matches);

    $book_id = $matches[1];
    $book_name = $matches[2];
    $description = $matches[3];
    $book_src = $matches[4];
    $category_index = $matches[5];
    $tag = $matches[6];
    $total_word_count = $matches[7];
    $up_status = $matches[8];
    $update_status = $matches[9];
    $is_paid = $matches[10];
    $discount = $matches[11];
    $discount_end_time = $matches[12];
    $cover = $matches[13];
    $author_name = $matches[14];
    $uptime = $matches[15];
    $newtime = $matches[16];
    $review_amount = $matches[17];
    $reward_amount = $matches[18];
    $chapter_amount = $matches[19];
    $is_original = $matches[20];


    $cover_img = str_replace('http://', 'https://', $cover);

    $ongoing = ($up_status === "0") ? '1' : '0';

    $book_name = json_decode('"' . $book_name . '"');

    $author_name = json_decode('"' . $author_name . '"');
    $description = json_decode('"' . $description . '"');
    $description = nl2br($description);


    $detail  = '<b>Chapter amount:</b> '.$chapter_amount.' / <b>Last updated:</b> ' .$uptime.' / <b>Word count:</b> ' .$total_word_count;
    $response = array(
        'data' => array(
            'book_name' => $book_name,
            'author' => $author_name,
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


