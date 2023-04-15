<?php
include $_SERVER['DOCUMENT_ROOT']."/inc/function.php";
echo '


<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Raudo">
<meta property="og:site_name" content="Raudo">
<meta name="theme-color" content="#22292F">
<meta name="robots" content="index,follow">
<meta name="googlebot" content="noindex,nofollow">
<meta name="format-detection" content="telephone=no">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link type="image/x-icon" rel="shortcut icon" href="/assets/images/icon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fork-awesome/1.2.0/css/fork-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
<style>
.logo_color{color:#112031}.footer1{background:#3D4852;color:#fff;margin-top:30px}.header_color1{--header-back-color:#FBF6F4}.header1{padding-top:30px;padding-bottom:3px;border-bottom:5px solid #ff3d00}.color_white{color:#fff!important}.header_menu1{color:#3A3845!important;font-weight:700}.div_color_yellow1{background-color:#FCE2DB}.book_title_search{color:#2C2520!important;font-weight:900}.book_author_search{color:#131B1A!important}.book_list_cmt{font-size:14px;color:#15133C}.detail_title{background-color:#d3d3d3;padding:20px}.detail_des{border:2px dashed #000!important;background-color:#d3d3d3!important;text-align:justify;text-justify:inter-word;padding:10px}.detail_img{border:2px ridge #000;width:220px}.box-buy-chap{background-color:#ff3d00;max-width:100%;width:250px;padding:20px;border:2px solid #000;margin:20px;font-size:20px}a:link{text-decoration:none}a:visited{text-decoration:none}.pagination{display:inline-block}.pagination a{color:#000;float:left;padding:8px 16px;text-decoration:none;transition:background-color .3s;border:1px solid #ddd;margin:0 4px}.pagination a.active{background-color:#FCE2DB;border:1px solid #ff3d00}.pagination a:hover:not(.active){background-color:#ddd}ul.breadcrumb{padding:10px 16px;list-style:none;background-color:#eee}ul.breadcrumb li{display:inline;font-size:18px}ul.breadcrumb li+li:before{padding:8px;color:#000;content:"/\00a0"}ul.breadcrumb li a{color:#fcbc04;text-decoration:none}ul.breadcrumb li a:hover{color:#01447e;text-decoration:underline}.rounded{border-radius:.55rem!important}a{text-decoration:none}.post-content{text-align:justify;padding:20px}ul.pager{text-align:center;list-style:none}ul.pager li{display:inline}::-webkit-scrollbar{width:10px}::-webkit-scrollbar-track{background-color:#fff}::-webkit-scrollbar-thumb{background-color:#07b}::-webkit-scrollbar-thumb:hover{background-color:#ccc}::-webkit-scrollbar-thumb:active{background-color:#ccc}::selection{color:#fff;background:#159f85}@-webkit-keyframes androidbugfix{from{padding:0}to{padding:0}}*{margin:0;padding:0;outline:none}h1{text-align:center}p{margin-top:12px;font-size:18px;letter-spacing:-.03px;line-height:1.58}.center{text-align:center}body{max-width:1150px;margin:auto;word-wrap:break-word;box-shadow:rgba(17,17,26,0.1) 0 0 16px;background-color:#fff}.cv-btn{position:fixed;display:flex;z-index:99999;right:.5rem;bottom:.5rem;border:none;width:1.75rem;height:1.75rem;background:rgba(11,91,137,.5);cursor:pointer;color:#fff;border-radius:2px;padding:.25rem}.cv-btn:hover{background:#0d75b5}div.ex3{max-height:70%;overflow:auto;}
</style>
';

switch ($translator_button) {
    case 'stv':
        echo '<script src="/assets/js/stv-translate.min.js"></script>';
        break;
    case 'bing':
        echo '<script src="/assets/js/bing-translator.js"></script>';
        break;
    case 'google':
        echo '<script src="/assets/js/google-translate.js"></script>';
        break;
    case 'lingvanex':
        echo '<script src="/assets/js/lingvanex-translate.js"></script>';
        break;
}

?>