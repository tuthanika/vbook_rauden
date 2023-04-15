<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;
    $link_url =  "https://api3-normal-lf.fqnovel.com/reading/bookapi/directory/all_items/v/?need_version=true&book_id=" . $book_id . "&iid=2159861899465991&aid=1967&app_name=novelapp&version_code=311";
    $res_json = curl_json_android($link_url);

    $source = 'https://fanqienovel.com/page/'.$book_id;

    $book_name = $res_json['data']['book_info']['book_name'];
    $author = $res_json['data']['book_info']['author'];
    // $free_status = $res_json['data']['book_info']['free_status'];
    $description =  $res_json['data']['book_info']['abstract'];
    $description = nl2br($description);
    $cover_img = str_replace("~tplv-shrink:640:0.image","~tplv-shrink:240:0.image",$res_json['data']['book_info']['thumb_url']);
    // $cover_img = "https://images.weserv.nl/?url=" . $res_json['data']['book_info']['thumb_url'] . "&w=240&output=webp";
    $epoch  = $res_json['data']['book_info']['last_publish_time'];
    $last_publish_time = new DateTime("@$epoch");
    $last_publish_time = $last_publish_time->format('Y-m-d H:i:s');
    $serial_count = $res_json['data']['book_info']['serial_count'];
    $word_number = $res_json['data']['book_info']['word_number'];
    $ongoing = '-1';
    // $original_book_name = $res_json['data']['book_info']['original_book_name'];
    // $is_changed_name = strcmp($book_name,$original_book_name);
    // $sub_info = $res_json['data']['book_info']['sub_info'];
    // $last_chapter_title = $res_json['data']['book_info']['last_chapter_title'];
    // $last_chapter_item_id = $res_json['data']['book_info']['last_chapter_item_id'];
    // $create_time = $res_json['data']['book_info']['create_time'];
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


