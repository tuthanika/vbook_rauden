<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/head.php";
    echo '<title>404!</title>';
    include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/search_widget_index.php";

echo '<
<div class="center">
<p style="padding-top:30px">
<h1 style="font-size: 65px;">404!</h1>

<b>The current page has been swallowed by an unknown creature ╮(๑•́ ₃•̀๑)╭</b>
</p>
<p>
Please check the link again and try again.
</p>
</div>
';

include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php";

?>