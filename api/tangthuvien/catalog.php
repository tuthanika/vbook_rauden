<?php
    error_reporting(E_ERROR | E_PARSE);

    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php"; 

    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $book_id = hex2bin($book_id);

    $link_url = "https://truyen.tangthuvien.vn/doc-truyen/" . $book_id . "";

    $html0 = str_get_html(curl_normal($link_url));
    $bid = $html0->find('input[name=story_id]', 0)->value;

    $html1 = curl_normal("https://truyen.tangthuvien.vn/story/chapters?story_id=" . $bid);

    $pattern = '/<a\s+class="link-chap-\d+"\s+href="(.*?)".*?>\s*<span.*?>(.*?)<\/span>\s*<\/a>/';
    preg_match_all($pattern, $html1, $matches, PREG_SET_ORDER);
    


    $item_list = array();
    $chapter_number = 0;

    // Extract the links and titles from the matches
    foreach ($matches as $match) {
        $chapter_number++;
        $link = trim($match[1]);
        $name = html_entity_decode(trim($match[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        $chapter_id = trim(basename($link));
        $chapter_id = bin2hex($chapter_id);
        $on = true;
        $item_data = array("name" => $name, "url" => $chapter_id, "index" => $chapter_number, "on" => $on);
        array_push($item_list, $item_data);
    }



    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);
    $html->clear();
    unset($html);
?>