<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
    echo '<title>'.$cweb.'</title>';
    include $_SERVER['DOCUMENT_ROOT']."/api/site-config.php";


    if (!in_array($cweb, array_column($site_config_list, 'name')) || 
        $site_config_list[array_search($cweb, array_column($site_config_list, 'name'))]['type_embed'] != 'noembed') {
            header("Location: /404");
            die();
    }

    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/search_widget.php";

    $link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/gen.php?index=" . $index . "&page=" . $page_show;
    $current_uri = "/site/".$cweb."?index=" . $index."&page=";
    $json1 = curl_json($link_url);


    $link_url_genre = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/genre.php";

    
    $json2 = curl_json($link_url_genre);
    $all_book = $json1['data']['item_list'];
    $site_title = $json1['data']['title'];
    $count_item = 0;

    $locale = null;
    foreach ($site_config_list as $site_config) {
        if ($site_config["name"] === $cweb) {
            $locale = $site_config["locale"];
            break;
        }
    }

    echo  '
    <div class="center">
    
    <select id="genre">';
    foreach ($json2['data']['item_list'] as $item) {
        $link_value = "/site/".$cweb."?index=" . $count_item."&page=1";

        echo "<option value='".$link_value."'";
    
        if ($count_item == $index) {
            echo " selected";
        }
        echo ">".$item['title']."</option>";
        $count_item++;
    }
    echo '</select>
    </div>
    ';


    echo '


    <div class="card fluid center div_color_yellow1">
        <h3>'.getFlagEmoji($locale).' '.$cweb.' - '.$site_title.'</h3>
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
                            <a href="/site/'.$cweb.'/'.$book_id.'/" title="'.$book_name.'">
                                <img class="lazyload" style="border: 1px ridge black; height:65%;" data-src="'.$cover_img.'"/>
                            </a>
                            <h5><a  class="book_title_search" href="/site/'.$cweb.'/'.$book_id.'/">'.$book_name.'</a></h5>
                            <p style="font-size:14px"><i class="fa fa-user" aria-hidden="true"></i> <a class="book_author_search" href="/search?q='.$author.'" title="'.$author.'">'.$author.'</a></p>
                        </div>
                    </div>
                </div>
                ';
            
        }
        
    echo '</div>';
    echo '<hr>';
    c_pagination_nototal_element_2($current_uri, $page_show);
    echo '
    <script>
    const selectElement = document.getElementById("genre");
    selectElement.addEventListener("change", (event) => {
        window.location.href = event.target.value;
    });
    </script>

    
    ';
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";

?>