<?php

$site_name = "Raudo";

$keyword = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
$keyword = trim($keyword);
$keyword2 = urlencode($keyword);
$kfolder = filter_input(INPUT_GET, 'k', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
$cweb = filter_input(INPUT_GET, 'cweb', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
$index = filter_input(INPUT_GET, 'index', FILTER_SANITIZE_STRING, ['options' => ['default' => '0']]);

$page = isset($_GET['page']) ? ($_GET['page'] - 1) : 0;
$page = htmlspecialchars($page);
$page_show = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING, ['options' => ['default' => '1']]);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING, ['options' => ['default' => 'man']]);
$top = filter_input(INPUT_GET, 'top', FILTER_SANITIZE_STRING, ['options' => ['default' => 'top']]);
$mode = filter_input(INPUT_GET, 'mode', FILTER_SANITIZE_STRING, ['options' => ['default' => 'hot']]);
$time = filter_input(INPUT_GET, 'time', FILTER_SANITIZE_STRING, ['options' => ['default' => 'week']]);
function curl_json($link_url)
{
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $link_url
        )
    );
    $resp = curl_exec($curl);
    curl_close($curl);
    $response1 = json_decode($resp, true);
    return $response1;
}
function curl_normal($link_url)
{
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $link_url
        )
    );
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

function curl_normal2($link_url)
{

    $ch = curl_init($link_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    $resp = curl_exec($ch);
    curl_close($ch);
    return $resp;
}



function curl_normal_gb2312($link_url)
{

    $ch = curl_init($link_url);
    curl_setopt($ch, CURLOPT_URL, $link_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: gb2312'));
    $resp = curl_exec($ch);
    curl_close($ch);
    return $resp;
}







function curl_android($link_url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $link_url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_USERAGENT => 'Android'
    )
    );
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

function curl_json_android($link_url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $link_url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_USERAGENT => 'Android'
    )
    );
    $resp = curl_exec($curl);
    curl_close($curl);
    $response1 = json_decode($resp, true);
    return $response1;
}


function c_pagination_change($current_uri)
{
    echo '
    <br/>
    <div class="page-item">
        <input type="number" id="pagi_num_no" name="page" min="1" max="1000">
        <input type="button" onclick="change_Pagi()" class="button bordered" value="Go">

    
    </div>
    <script type="text/javascript">
    $(document).ready(function(){$("#pagi_num_no").keypress(function(n){13==n.which&&(n.preventDefault(),change_Pagi())})});
    function change_Pagi(){var a=$("#pagi_num_no").val();$.isNumeric(a)?window.location.href="' . $current_uri . '"+a:alert("Please enter a valid page number")}
    </script>
    ';
}

function c_pagination_nototal_element_2($current_uri, $page_show)
{
    echo '
    <div class="center">
        <div class="pagination" id="paginationSection">';
    $pageID = $page_show;
    $pageIDm1 = $pageID - 1;
    $pageIDm2 = $pageID - 2;
    $pageIDp1 = $pageID + 1;
    $pageIDp2 = $pageID + 2;
    $current_cate = $current_uri . '';
    if ($pageID > 1) {
        echo '<a href="' . $current_cate . $pageIDm1 . '" >«</a>';
    }
    if ($pageID > 3) {
        echo '<a href="' . $current_cate . '1">1</a>';
    }
    if ($pageID > 2) {
        echo '<a href="' . $current_cate . $pageIDm2 . '" >' . $pageIDm2 . '</a>';
    }
    if ($pageID > 1) {
        echo '<a href="' . $current_cate . $pageIDm1 . '" >' . $pageIDm1 . '</a>';
    }
    echo '<a disabled="" class="active">' . $pageID . '</a>';
    echo '<a href="' . $current_cate . $pageIDp1 . '" >' . $pageIDp1 . '</a>';
    echo '<a href="' . $current_cate . $pageIDp2 . ' ">' . $pageIDp2 . '</a>';
    echo '<a href="' . $current_cate . $pageIDp1 . '" >»</a>';
    echo '</div>';

    c_pagination_change($current_uri);
    echo '</div>';
}

function getFlagEmoji($flag_string)
{
    switch ($flag_string) {
        case "en_US":
            $flag_emoji = "🇺🇸";
            break;
        case "vi_VN":
            $flag_emoji = "🇻🇳";
            break;
        case "zh_CN":
            $flag_emoji = "🇨🇳";
            break;
        default:
            $flag_emoji = "";
    }
    return $flag_emoji;
}

$cookies = array(
    'translator_button' => 'stv',
    'translator_bing' => 'vi',
    'translator_google' => 'vi',
    'translator_lingvanex' => 'vi'

);

foreach ($cookies as $name => $default) {
    if (!isset($_COOKIE[$name])) {
        setcookie($name, $default, time() + (86400 * 300), '/');
        $_COOKIE[$name] = $default;
    }
}

$translator_button = htmlspecialchars($_COOKIE['translator_button']);
$translator_bing = htmlspecialchars($_COOKIE['translator_bing']);
$translator_google = htmlspecialchars($_COOKIE['translator_google']);
$translator_lingvanex = htmlspecialchars($_COOKIE['translator_lingvanex']);

?>