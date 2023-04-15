<?php


echo '
    <div class="center"> 
        <form id="formSearch" action="/search.php" method="get"> 
            <input type="text"name="q" style="width:60%" placeholder="Enter a website link" class="s search-input" id="searchContent"> 
            <input type="hidden" name="cweb" value="null">
            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Go</button>
        </form>
    </div>
';
?>