<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
    echo '<title>'.$site_name.'</title>';
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/api/site-config.php";
    include $_SERVER['DOCUMENT_ROOT']."/search_widget_index.php";

    echo'

    <div class=""><h4>Browser:</h4>';

    foreach ($site_config_list as $site_config) {
        if($site_config["type_embed"] === "noembed") {
            echo '<a href="/site/'.$site_config["name"].'/"><button class="button" type="button">'.getFlagEmoji($site_config["locale"]).' '.$site_config["name"].'</a></button>';
        }
    }
echo'
    </div>

    
    ';

    echo '
    <div class""><h4>Supported links:</h4>
     <ul>';
     foreach ($site_config_list as $site_config) {
        if(!empty($site_config["sample"]))
            echo '<li>'.$site_config["sample"].'</li>';
    }

echo'
     </ul>
    </div>
    
    
    <div>
    
<h4>Notes:</h4>
<ul>
<li>- html5qq is a website that needs to be accessed using QQ Browser for reading. This is the official text.</li>
<li>- jiaston is from the novel pirated app Biquge.</li>
<li>- Fanqie and 17k can read the chapter without downloading their app.</li>
</ul>
    
    </div>
    
    
    
    
    
    
    
    
    
    
    ';


    include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";

?>