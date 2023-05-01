<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    if (empty($keyword)) {
        die();
    }
    $chapter_id = $keyword;
    $book_id = $kfolder;

    $url = "https://novel.html5.qq.com/be-api/content/ads-read";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Referer: https://novel.html5.qq.com/",
       "Q-GUID: 0ee63838b72eb075f63e93ae0bc288cb",
       "QIMEI36: 8ff310843a87a71101958f5610001e316a11",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = '{"ContentAnchorBatch":[{"BookID":"'.$book_id.'","ChapterSeqNo":["'.$chapter_id.'"]}],"Scene":"chapter"}';
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = curl_exec($curl);
    curl_close($curl);
    
    
    
    
    $response1 = json_decode($resp, true);
    $data = $response1["data"]["Content"][0];
    $title = $data["ChapterInfo"]["Title"];
    $content = nl2br($data["Content"][0]);
    $content = preg_replace('/　　/u', '', $content);

    $response = array(
        'data' => array(
            'title' => $title,
            'content' => $content
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);


?>

