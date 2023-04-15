<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/head.php";
    if (empty($keyword)) {
        die("No Chap ID");
    }

    $chapter_id = $keyword;
    $book_id = $kfolder;
    $link_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . "/api/" . $cweb . "/chap.php?q=" . $chapter_id . "&k=" . $book_id;
    $json1 = curl_json($link_url);
    $chapter_title = $json1['data']['title'];
    $chapter_content = $json1['data']['content'];

    echo '<title>' . $chapter_title . '</title>';

    include $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
    include("search_widget.php");

    echo '
            <ul class="breadcrumb center">
                <li><a href="/site/' . $cweb . '/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li><a id="book_id" href="/site/' . $cweb . '/' . $book_id . '"><i class="fa fa-book" aria-hidden="true"></i></a></li>
                <li><a id="book_id2" href="/site/' . $cweb . '/' . $book_id . '/catalog"><i class="fa fa-list" aria-hidden="true"></i></a></li>
            </ul>
            <div class="center">
                <button onclick="dichThongTinTruyen()" class="small primary"><i class="fa fa-language" aria-hidden="true"></i> Translate</button>
                <button class="small tertiary" onclick="CopyToClipboard()"><i class="fa fa-files-o" aria-hidden="true"></i> Copy raw</button>
            </div>
            <div id="noidung">

            <h1 class="post-title" itemprop="name headline" id="chapter_title">' . $chapter_title . '</h1>
            <article class="post-content" itemscope="" itemtype="http://schema.org/BlogPosting" id="chapter_content" style="font-size:1.25em; border: 2px dashed black; background-color: #F2EBE9;font-family:Lora; ">' . $chapter_content . '</article>
            </div>
            <div class="center" id="mucluc2" style="display:none">
                <a id="prev-chap"><button class="small inverse"><i class="fa fa-step-backward" aria-hidden="true"></i> J</button></a>
                <select style="width:190px" id="selectList" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"></select>
                <a id="next-chap"><button class="small inverse">K <i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
            </div>

            <div class="center">
                <button id="mucluc1" class="shadowed small inverse" onclick="loadCatalog(`' . $cweb . '`,`' . $book_id . '`,`' . $chapter_id . '`)"><i class="fa fa-object-ungroup" aria-hidden="true"></i> Load ToC</button>
            </div>
        ';

    echo '
    <script>
        const book_id = "' . $book_id . '";
        const chapter_id = "' . $chapter_id . '";
        const cweb = "' . $cweb . '";


    </script>
    <script type="text/javascript" src="/assets/js/chap.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lora|Playfair+Display:700i,900" rel="stylesheet">
    ';
    include $_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php";

?>