<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php"; 

	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;

    $link_url =  "https://book.qidian.com/info/" . $book_id . "/";

    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);

    $cover_img = $html->find('meta[property="og:image"]', 0)->getAttribute('content');
    $description = $html->find('meta[property="og:description"]', 0)->getAttribute('content');
    $description = trim(str_replace("&lt;br&gt;", "<br>", $description));
    $description = preg_replace('/　　/u', '', $description);

    $author = $html->find('meta[property="og:novel:author"]', 0)->getAttribute('content');
    $book_name = $html->find('meta[property="og:novel:book_name"]', 0)->getAttribute('content');
    $serial_count = $html->find('#J-catalogCount', 0)->plaintext;
    $last_publish_time = $html->find('body > div.wrap > div.book-detail-wrap.center990 > div.book-information.cf > div.book-info > h1 > span.book-update-time', 0)->plaintext;
    preg_match('/\d+/', $serial_count, $matches);
    $serial_count = $matches[0];
    $last_publish_time = str_replace("更新时间", "", trim($last_publish_time));

    $source = $link_url;
    $status = $html->find('meta[property="og:novel:status"]', 0)->getAttribute('content');
    $ongoing = ($status === "连载") ? '1' : '0';


    $detail  = '<b>Chapter amount:</b> '.$serial_count.' / <b>Last updated:</b> ' .$last_publish_time;
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


