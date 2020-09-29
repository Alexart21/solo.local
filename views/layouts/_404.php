<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <link href="/css/stars.css" rel="stylesheet">
    <style>
        body{
            background: #000;
            font-family: "Arial Black";
        }
        h1{
            margin-top: 1em;
            color: red;
            text-shadow: 5px 5px 50px #fff;
            text-align: center;
            font-size: 200%;
        }
        h2{
            color: #fff;
            text-align: center;
        }
        img{
            width: 575px;
            height: 388px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div style="z-index: -100">
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
</div>
<?php
echo $content;
?>
<a href="/"><img width="575" height="388" src="/img/404.jpg"></a>

</body>
</html>
