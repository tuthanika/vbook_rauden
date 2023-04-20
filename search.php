<?php


include $_SERVER['DOCUMENT_ROOT'] . "/inc/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/api/site-config.php";

// Redirect to book
if (!empty($keyword)) {
    if (strpos($keyword, "http://") === 0 || strpos($keyword, "https://") === 0) {
        foreach ($site_config_list as $site_config) {
            $regexp = $site_config['regexp'];
            if (preg_match($regexp, $keyword, $matches)) {
                // The URL matches the regular expression
                $book_id = $matches[1]; // Extract the book ID from the URL
                if (!preg_match("/^[a-z0-9]+$/", $book_id)) {
                    $book_id = bin2hex($book_id);
                }
                

                header("Location: /site/" . $site_config['name'] . "/" . $book_id);
                die();
            } else {
                // The URL does not match the regular expression
            }
        }
    }
    // if not search in site
    if ($cweb === "null") {
        
        echo '<title>Search</title>';
        include $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
        include("search_widget.php");
        
        echo '<h3 class="center">You need to go to a website (>Browser), to be able to search by keyword.</h3>';
        
        include $_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php";
        
        // header("Location: /404/");
        die();
    }



    $link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/search.php?q=" . $keyword2;
    $json1 = curl_json($link_url);
    $all_book = $json1['data']['item_list'];
}

echo '<title>Search</title>';
include $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
include("search_widget.php");


if (!empty($keyword)) {
    echo '
        <div class="card fluid center div_color_yellow1">
            <h3><i class="fa fa-search" aria-hidden="true"></i> Search results: ' . $keyword . '</h3>
        </div>
        <div class="row center" id="search_result">';
    foreach ($all_book as $item) {
        $cover_img = $item['cover_img'];
        $book_id = $item['book_id'];
        $author = $item['author'];
        $book_name = $item['book_name'];
        echo '
                    <div class="col-sm-6 col-md-3">
                        <div class="card fluid">
                            <div class="section " style="height: 340px;"> 
                                <a href="/site/' . $cweb . '/' . $book_id . '/" title="' . $book_name . '">
                                    <img class="lazyload" style="border: 1px ridge black; height:65%;" data-src="' . $cover_img . '"/>
                                </a>
                                <h5><a  class="book_title_search" href="/site/' . $cweb . '/' . $book_id . '/">' . $book_name . '</a></h5>
                                <p style="font-size:14px"><i class="fa fa-user" aria-hidden="true"></i> <a class="book_author_search" href="/search?q=' . $author . '" title="' . $author . '">' . $author . '</a></p>
                            </div>
                        </div>
                    </div>
                    ';

    }

    echo '</div>';

}
include $_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php";
?>