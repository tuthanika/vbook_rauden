<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php"; 
	if (empty($keyword)) {
        die("No Book ID");
    }
    $book_id = $keyword;
    $link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME']."/api/".$cweb."/detail.php?q=" . $book_id;
    $json1 = curl_json($link_url);
    $book_name = $json1['data']['book_name'];
    $description = $json1['data']['description'];
    $cover_img = $json1['data']['cover_img'];
    $author = $json1['data']['author'];
    $detail = $json1['data']['detail'];
    $ongoing = $json1['data']['ongoing'];
    $source = $json1['data']['source'];

    $book_url = "/site/".$cweb."/".$book_id;


    echo '<title>《'.$book_name.'》 – '.$author.'</title>';
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    include("search_widget.php");
    
    echo '<div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="box-colored center">
            <img style="width:200px" id="book_cover" class="lazyload" loading="lazy" data-src="'.$cover_img.'"/><br/>
                <button onclick="dichThongTinTruyen()" class="small primary"><i class="fa fa-language" aria-hidden="true"></i> Translate</button><br>
                <button class="small tertiary"><a href="/site/'.$cweb.'/'.$book_id.'/catalog" class="color_white"><i class="fa fa-list" aria-hidden="true"></i> Table of Contents</a></button><br>
                <button onclick="bookmark()" class="small primary"><i class="fa fa-bookmark" aria-hidden="true"></i> Add to a bookshelf</button><br>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="box-colored">
                <h1 class="post-title detail_title book_title_search" id="book_name" itemprop="name headline">'.$book_name.'</h1>';

echo'           <p><b><i class="fa fa-user" aria-hidden="true"></i> Author:</b> <a class="book_title_search" id="book_author">'.$author.'</a></p>
                <p><b><i class="fa fa-circle-o-notch" aria-hidden="true"></i></b> '.$detail.'</p>
                ';
                if ($ongoing === '1') 
                echo '<p><b><i class="fa fa-circle-o" aria-hidden="true"></i> Status: </b> Ongoing</p>';
                if ($ongoing === '0') 
                echo '<p><b><i class="fa fa-circle-o" aria-hidden="true"></i> Status: </b> Completed</p>';


echo '
                <p><b><i class="fa fa-plane" aria-hidden="true"></i> Website:</b> 
                <a  target="_blank" rel="noopener noreferrer" href="'.$source.'">Source</a> / 
                <a  target="_blank" rel="noopener noreferrer" href="https://chivi.app/wn/search?q='.$book_name.'&t=btitle">Chivi</a> / 
                <a target="_blank" rel="noopener noreferrer" href="https://www.google.com/search?q='.$book_name.'">Google</a> /
                <a target="_blank" rel="noopener noreferrer" href="https://www.bing.com/search?q='.$book_name.'">Bing</a> / 
                <a target="_blank" rel="noopener noreferrer" href="https://owllook2.yueing.org/search?wd='.$book_name.'">Owlook</a> 

                </p>

                <p><b><i class="fa fa-building-o" aria-hidden="true"></i> Description:</b></p>
                <div class="detail_des"> <br>'.$description.'</div>
            
            </div>
        </div>
    </div>
</div>


';
?>

<script>

    function bookmark() {
        let book_mark = [];
        if(localStorage.getItem('book_mark'))
        {
            book_mark = JSON.parse(localStorage.getItem('book_mark'));
        }
        let book_name = document.getElementById("book_name").innerHTML;

        let book_cover = $("#book_cover").attr("src");

        
        if (!book_mark.find(item => item.id === "<?php echo $book_url;?>")) { 
            let book_dt = {name: book_name, id: "<?php echo $book_url;?>", cover: book_cover};
            book_mark.push(book_dt);
            var json_str = JSON.stringify(book_mark);
            localStorage.setItem('book_mark', json_str)
        }

        alert("Added")
        
    }





</script>






<?php include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";?>





