<?php 
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
	if (empty($keyword)) {
        die("No Book ID");
    }

    echo '<title>Table of Contents</title>';
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    include("search_widget.php");

    $book_id  = $keyword;

    $link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME']."/api/".$cweb."/catalog.php?q=" . $book_id;
    $json1 = curl_json($link_url);


    function echoChapter($chapter_number, $chapter_id, $chapter_name)
    {
        $book_id = $GLOBALS["book_id"];
        $cweb = $GLOBALS["cweb"];
        echo '
            <div class="col-sm-12 col-md-4">
                <div class="card fluid" style="--card-border-color:#242F9B">
                    <div class="section" style="background-color:#FBFBF4"><span class="chapter_info"> # '.$chapter_number.'</span></span>
                    <br><b><a class="chapter_name" style="color:#06113C" href="/site/'.$cweb.'/'.$book_id.'/'.$chapter_id.'">'.$chapter_name.'</a></b> </div>
                </div>
            </div>
        
        ';


    }


    echo '
    <ul class="breadcrumb center">
        <li><a href="/site/'.$cweb.'/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="/site/'.$cweb.'/'.$book_id.'"><i class="fa fa-book" aria-hidden="true"></i></a></li>
    </ul>

    <div class="container" style="padding-top: 10px;">
       <div class="row">';
       $item_data_list = $json1['data']['item_list'];

        foreach ($item_data_list as $el1) {
            $name = $el1['name'];
            // Unreadable story chapter, vip chapter, unfinished chapter.
            if($el1['on'] == false) {
                $name = "<strike style='color:red'>".$name."</strike>";
            }
            echoChapter($el1['index'], $el1['url'], $name);
        }
    echo '</div></div>';
    


    
    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";



    
?>





