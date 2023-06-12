<?php

$json = '[
    { "title": "truyencv", "input": "truyencv", "script": "gen.js" },
    { "title": "tangthuvien", "input": "tangthuvien", "script": "gen.js" },
    { "title": "wattpad", "input": "wattpad", "script": "gen.js" },
    { "title": "html5qq", "input": "html5qq", "script": "gen.js" },
    { "title": "uukanshu", "input": "uukanshu", "script": "gen.js" },
    { "title": "69shu", "input": "69shu", "script": "gen.js" }
]';

header('Content-Type: application/json');
echo $json;