<?php
    $item_list = array();

    $item_data = array("book_id" => "this-website-is-not-searchable-yet", "book_name" => "This website is not searchable yet", "author" => "Author", "cover_img" => "https://i.imgur.com/o7mxpqK.jpg");
    array_push($item_list, $item_data);
    $json_response = array("data" => array("item_list" => $item_list));
    echo json_encode($json_response);

?>