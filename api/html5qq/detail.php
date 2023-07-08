<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php"; 
	if (empty($keyword)) {
        die();
    }
    $book_id = $keyword;
    $link_url = "https://bookshelf.html5.qq.com/qbread/api/novel/adbooks/bookinfo?bookid=" . $book_id;
    $source = "https://bookshelf.html5.qq.com/qbread/api/novel/intro-info?bookid=".$book_id;
    $curl = curl_init($link_url);
    $headers = array(
        "user-agent":"Mozilla/5.0 (Linux; Android 10; MI 8 Build/QKQ1.190828.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.101 Mobile Safari/537.36",
        "Referer":"https://bookshelf.html5.qq.com/qbread",
    );
    curl_setopt_array($curl, array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $link_url,
        CURLOPT_RETURNTRANSFER => 1
    )
    );
    $resp = curl_exec($curl);
    curl_close($curl);
    $response1 = json_decode($resp, true);
	$data = $response1['data'];
    $book = $data['bookInfo'];
    $book_name = $book['resourceName'];
    $author = $book['author'];
    // $free_status = $res_json['data']['book_info']['free_status'];
    $description = nl2br($book['summary']);

    $cover_img = $book['picurl'];
    $cover_img = "https://images.weserv.nl/?url=".$cover_img."&output=webp";

    // $cover_img = "https://images.weserv.nl/?url=" . $res_json['data']['book_info']['thumb_url'] . "&w=240&output=webp";
    $epoch  = $book['lastUpdatetime'];
    $last_publish_time = new DateTime("@$epoch");
    $last_publish_time = $last_publish_time->format('Y-m-d H:i:s');
    $serial_count =  $book['serialnum'];
    $word_number = $book['contentsize'];
    $ongoing = '-1';

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


