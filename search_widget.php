<?php


echo '
    <div class="center"> 
        <form id="formSearch" action="/search.php" method="get"> 
            <input type="text"name="q" style="width:60%" placeholder="Enter the keyword or the website link" class="s search-input" id="searchContent"> 
            <input type="hidden" name="cweb" value="' . $cweb . '">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
        </form>
    </div>
';
?>