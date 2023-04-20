<?php

$site_config_list = array(
    array(
        "name" => "metruyencv",
        "source" => "https://metruyencv.com",
        "regexp" => "/api.mottruyen.com\/story\/\?story_id=(\d+)/",
        "type" => "novel",
        "type_embed" => "noembed",
        "sample" => "",
        "locale" => "vi_VN"
    ),
    array(
        "name" => "tangthuvien",
        "source" => "https://truyen.tangthuvien.vn",
        "regexp" => "/truyen.tangthuvien.vn\/doc-truyen\/(.+)/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://truyen.tangthuvien.vn/doc-truyen/quy-bi-chi-chu",
        "locale" => "vi_VN"
    ),
    array(
        "name" => "wattpad",
        "source" => "https://wattpad.com",
        "regexp" => "/.wattpad.com\/story\/(\d+)-(.*?)/",
        "type" => "novel",
        "type_embed" => "noembed",
        "sample" => "https://www.wattpad.com/story/285099293-tattered-paige-book-1",
        "locale" => "vi_VN"
    ),
    array(
        "name" => "html5qq",
        "source" => "https://bookshelf.html5.qq.com/qbread/categorylist?traceid=0809004&sceneid=FeedsTab&strageid=&ch=001995&tabfrom=top&feeds_version=8516&reader_version=0&groupid=1502&tag_type_id=1%27",
        "regexp" => "/bookshelf.html5.qq.com\/qbread\/intro\?bookid=(\d+)/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://bookshelf.html5.qq.com/qbread/intro?bookid=1121139133",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "jiaston",
        "source" => "https://infosxs.pysmei.com",
        "regexp" => "/infosxs.pysmei.com\/BookFiles\/Html\/\d+\/(\d+)\/info\.html/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://infosxs.pysmei.com/BookFiles/Html/649/648058/info.html",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "qidian",
        "source" => "http://qidian.com",
        "regexp" => "/qidian\.com\/(?:info|book)\/(\d+)/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://book.qidian.com/info/1036370336/",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "fanqienovel",
        "source" => "https://fanqienovel.com",
        "regexp" => "/fanqienovel.com\/page\/(\d+)/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://fanqienovel.com/page/7042175102489725963",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "17k",
        "source" => "https://17k.com",
        "regexp" => "/.17k.com\/book\/(\d+).html$/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://www.17k.com/book/2275375.html",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "uukanshu",
        "source" => "https://www.uukanshu.com",
        "regexp" => "/(?:uukanshu\.com\/b\/|uukanshu\.com\/book\.aspx\?id=)(\d+)/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://www.uukanshu.com/b/74534/",
        "locale" => "zh_CN"
    ),
    array(
        "name" => "69shu",
        "source" => "https://www.69shu.com",
        "regexp" => "/69shu.com\/txt\/(\d+).htm/",
        "type" => "chinese_novel",
        "type_embed" => "noembed",
        "sample" => "https://www.69shu.com/txt/41121.htm",
        "locale" => "zh_CN"
    ),
    // array(
    //     "name" => "ishuquge",
    //     "source" => "https://www.ishuquge.la",
    //     "regexp" => "/ishuquge.la\/txt\/(\d+)/",
    //     "type" => "chinese_novel",
    //     "type_embed" => "noembed",
    //     "sample" => "https://www.ishuquge.la/txt/175555/",
    //     "locale" => "zh_CN"
    // ),
    array(
        "name" => "forew",
        "source" => "https://forew.7m.pl",
        "regexp" => "/forew.7m.pl\/temp\/(.*?)\/total.txt/",
        "type" => "novel",
        "type_embed" => "embed",
        "sample" => "",
        "locale" => "vi_VN"
    ),
    array(
        "name" => "nhimmeo",
        "source" => "https://nhimmeo.cf",
        "regexp" => "/nhimmeo.cf\/book\/(\d+)/",
        "type" => "novel",
        "type_embed" => "noembed",
        "sample" => "https://nhimmeo.cf/book/100193703",
        "locale" => "zh_CN"
    ),
);



?>