<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
    include $_SERVER['DOCUMENT_ROOT']."/inc/simple_html_dom.php"; 

    if (empty($keyword)) {
        die();
    }
    $book_id  = $keyword;
    $link_url =  "https://book.qidian.com/info/" . $book_id . "/";

    $res_html = curl_normal($link_url);
    // create a new DOM object from the string
    $html = str_get_html($res_html);
    $div = $html->find('#j-catalogWrap > div', 0);
    $li_elements = $div->find('li');
    $item_list = array();

    // loop through the li elements and output their text content
    foreach ($li_elements as $li) {
        $name = $li->find('h2.book_name a', 0)->plaintext;
        $chapter_id = $li->find('h2.book_name a', 0)->getAttribute('data-cid');
        $index = $li->getAttribute('data-rid');
        $on = $li->find('em.iconfont', 0) ? false : true;

        preg_match('/\/chapter\/(.*?)\/$/', $chapter_id, $matches);
        $chapter_id = $matches[1];
        $chapter_id =  ($on === true) ? ("f_".$chapter_id) : ("v_".$chapter_id);


        $chapter_id = bin2hex($chapter_id);

        $item_data = array("name" => $name, "url" => $chapter_id, "index" => $index, "on" => $on);
        array_push($item_list, $item_data);
    }



    $json_response = array("data" => array("item_list" => $item_list));
    header('Content-Type: application/json');

    echo json_encode($json_response);

?>