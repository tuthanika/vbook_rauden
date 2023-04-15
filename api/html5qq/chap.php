<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "https://bookshelf.html5.qq.com/qbread/api/wenxue/buy/ad-chapter/v3?resourceid=". $book_id ."&serialid=". $chapter_id ."&apn=1&readnum=1&duration=2&srcCh=";

    $curl = curl_init($link_url);
    $headers = array(
       "Referer: https://bookshelf.html5.qq.com/kdread/adread/chapter",
    );
    curl_setopt_array($curl, array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $link_url,
        CURLOPT_RETURNTRANSFER => 1
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    $response1 = json_decode($resp, true);
    $data = $response1["data"];
    $title = $data["serialName"];
    $content = implode("<br>", $data["content"]);
    
    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

